<?php

namespace App\Services;

use App\Models\Drug;
use App\Models\DrugSubstance;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;

/**
 * Сервис поиска лекарств
 *
 */
class DrugSearcher
{
    /** @var int */
    private $minMatched = 2;

    /** @var int */
    private $perPage = 2;

    /**
     * Поиск
     *
     * @param array  $substanceIds
     *
     * @return LengthAwarePaginator
     */
    public function search(array $substanceIds): LengthAwarePaginator
    {
        if (count($substanceIds) < 2) {
            return new PaginationLengthAwarePaginator([], 0, $this->perPage);
        }

        $substancesCount = count($substanceIds);

        $completeDrugIds = DrugSubstance::select(['drug_id'])
            ->whereIn('substance_id', $substanceIds)
            ->groupBy('drug_id')
            ->having(DB::raw('COUNT(substance_id)'), '=',$substancesCount)
            ->pluck('drug_id')
        ;

        $drugs = Drug::whereIn('id', $completeDrugIds)
            ->has('substances', '=', $substancesCount)
            ->whereDoesntHave('substances', function(Builder $query){
                $query->where('visible', false);
            })
            ->paginate($this->perPage);
        ;
        if (false === $drugs->isEmpty()) {
            return $drugs;
        }

        $partialDrugIds = DrugSubstance::select(['drug_id'])
            ->whereIn('substance_id', $substanceIds)
            ->groupBy('drug_id')
            ->having(DB::raw('COUNT(substance_id)'), '>=', $this->minMatched)
            ->orderBy(DB::raw('COUNT(substance_id)'), 'desc')
            ->pluck('drug_id');
        ;
        if ($partialDrugIds->isEmpty()) {
            return new PaginationLengthAwarePaginator([], 0, $this->perPage);
        }

        $idOrder = implode(', ', $partialDrugIds->toArray());
        $drugs   = Drug::whereIn('id', $partialDrugIds)
            ->orderBy(DB::raw("FIELD(id, $idOrder)"))
            ->whereDoesntHave('substances', function(Builder $query){
                $query->where('visible', false);
            })
            ->paginate($this->perPage);
        ;

        return $drugs;
    }
}
