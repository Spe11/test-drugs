<?php

namespace App\Services;

use App\Models\Drug;
use DB;
use Throwable;

/**
 * Сервис управления лекарствами
 *
 */
class DrugService
{
    /**
     * Добавить
     *
     * @param string $name
     * @param array  $substanceIds
     *
     * @return void
     */
    public function add(string $name, array $substanceIds)
    {
        DB::beginTransaction();

        try {
            $drug       = new Drug;
            $drug->name = $name;

            $drug->save();
            $drug->substances()->sync($substanceIds);

            DB::commit();
        }
        catch (Throwable $e) {
            report($e);
            DB::rollBack();
        }
    }

    /**
     * Редактировать
     *
     * @param Drug   $drug
     * @param string $name
     * @param array  $substanceIds
     *
     * @return void
     */
    public function update(Drug $drug, string $name, array $substanceIds)
    {
        DB::beginTransaction();

        try {
            $drug->name = $name;

            $drug->save();
            $drug->substances()->sync($substanceIds);

            DB::commit();
        }
        catch (Throwable $e) {
            report($e);
            DB::rollBack();
        }
    }

    /**
     * Удалить
     *
     * @param Drug $drug
     *
     * @return void
     */
    public function delete(Drug $drug)
    {
        $drug->delete();
    }
}
