<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\DrugSubstance
 *
 * @property int $drug_id
 * @property int $substance_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSubstance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSubstance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DrugSubstance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereDrugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereSubstanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DrugSubstance extends Model
{
    protected $table = 'drug_substance';

    use HasFactory;

    /**
     * Вещества
     *
     * @return HasOne
     */
    public function substances(): HasOne
    {
        return $this->hasOne(Substance::class);
    }
}
