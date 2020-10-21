<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Вещество
 *
 * @property int $id
 * @property string $name
 * @property bool $visible
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Substance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Substance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Substance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Substance whereVisible($value)
 * @mixin \Eloquent
 */
class Substance extends Model
{
    use HasFactory;

    protected $casts = [
        'visible' => 'bool'
    ];

    /**
     * Список доступных веществ
     *
     * @return string[]
     */
    public static function list(): array
    {
        return static::pluck('name', 'id')
            ->toArray()
        ;
    }
}
