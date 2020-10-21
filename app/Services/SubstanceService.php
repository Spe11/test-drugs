<?php

namespace App\Services;

use App\Models\Substance;

/**
 * Сервис управления веществами
 *
 */
class SubstanceService
{
    /**
     * Добавить
     *
     * @param string $name
     * @param bool   $visible
     *
     * @return void
     */
    public function add(string $name, bool $visible)
    {
        $product          = new Substance;
        $product->name    = $name;
        $product->visible = $visible;

        $product->save();
    }

    /**
     * Редактировать
     *
     * @param Substance $substance
     * @param string    $name
     * @param bool      $visible
     *
     * @return void
     */
    public function update(Substance $substance, string $name, bool $visible)
    {
        $substance->name    = $name;
        $substance->visible = $visible;

        $substance->save();
    }

    /**
     * Удалить
     *
     * @param Substance $substance
     *
     * @return void
     */
    public function delete(Substance $substance)
    {
        $substance->delete();
    }
}
