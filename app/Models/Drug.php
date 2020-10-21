<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Лекарство
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Drug extends Model
{
    use HasFactory;

    /**
     * Вещества
     *
     * @return BelongsToMany
     */
    public function substances(): BelongsToMany
    {
        return $this->belongsToMany(Substance::class);
    }

    /**
     * Состав
     *
     * @return string[]
     */
    public function getConsist(): array
    {
        return $this->substances()
            ->pluck('name')
            ->toArray()
        ;
    }

    /**
     * Видимость
     *
     * @return bool
     */
    public function isVisible(): bool
    {
        return false === $this->substances()
            ->where('visible', false)
            ->exists()
        ;
    }
}
