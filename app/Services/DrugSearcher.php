<?php

namespace App\Services;

use App\Models\Drug;
use App\Models\DrugSubstance;
use DB;
use Illuminate\Database\Eloquent\Collection;

/**
 * Сервис поиска лекарств
 *
 */
class DrugSearcher
{
    /** @var int */
    private $minMatched = 2;

    /**
     * Базовый поиск
     *
     * @param array  $substanceIds
     *
     * @return Collection
     */
    protected function baseSearch(array $substanceIds): Collection
    {
        $substancesCount = count($substanceIds);

        $completeDragIds = DrugSubstance::select(['drug_id'])
            ->whereIn('substance_id', $substanceIds)
            ->groupBy('drug_id')
            ->having(DB::raw('COUNT(substance_id)'), $substancesCount)
            ->pluck('drug_id')
        ;
        if (false === $completeDragIds->isEmpty()) {
            return Drug::whereIn('id', $completeDragIds)
                ->get()
            ;
        }

        $partialDragIds = DrugSubstance::select('drug_id')
            ->whereIn('substance_id', $substanceIds)
            ->groupBy('drug_id')
            ->having(DB::raw('COUNT(substance_id)'), '>=', $this->minMatched)
            ->orderBy(DB::raw('COUNT(substance_id)'), 'desc')
            ->pluck('drug_id');
        ;
        if (false === $partialDragIds->isEmpty()) {
            $idOrder = implode(', ', $partialDragIds->toArray());

            return Drug::whereIn('id', $partialDragIds)
                ->orderBy(DB::raw("FIELD(id, $idOrder)"))
                ->get()
            ;
        }

        return new Collection();
    }

    /**
     * Поиск видимых лекарств
     *
     * @param array  $substanceIds
     *
     * @return Collection
     */
    public function search(array $substanceIds): Collection
    {
        return $this->baseSearch($substanceIds)->filter(function (Drug $drug) {
            return $drug->isVisible();
        });
    }
}
