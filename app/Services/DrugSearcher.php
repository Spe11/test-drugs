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
    public function search(array $substanceIds): Collection
    {
        $substancesCount = count($substanceIds);

        $completeDragIds = DrugSubstance::select(['drug_id'])
            ->whereIn('substance_id', $substanceIds)
            ->groupBy('drug_id')
            ->having(DB::raw('COUNT(substance_id)'), $substancesCount)
            ->pluck('drug_id')
        ;

        $drugs = Drug::whereIn('id', $completeDragIds)
            ->get()
            ->filter(function (Drug $drug) {
                return $drug->isVisible();
            })
        ;
        if (false === $drugs->isEmpty()) {
            return $drugs;
        }

        $partialDragIds = DrugSubstance::select('drug_id')
            ->whereIn('substance_id', $substanceIds)
            ->groupBy('drug_id')
            ->having(DB::raw('COUNT(substance_id)'), '>=', $this->minMatched)
            ->orderBy(DB::raw('COUNT(substance_id)'), 'desc')
            ->pluck('drug_id');
        ;
        $idOrder = implode(', ', $partialDragIds->toArray());

        $drugs = Drug::whereIn('id', $partialDragIds)
            ->orderBy(DB::raw("FIELD(id, $idOrder)"))
            ->get()
            ->filter(function (Drug $drug) {
                return $drug->isVisible();
            })
        ;

        return $drugs;
    }
}
