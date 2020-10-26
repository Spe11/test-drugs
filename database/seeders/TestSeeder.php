<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('substances')->insert([
            [
                'id' => 1,
                'name' => 'Один',
                'visible' => true,
            ],
            [
                'id' => 2,
                'name' => 'Два',
                'visible' => true,
            ],
            [
                'id' => 3,
                'name' => 'Три',
                'visible' => true,
            ],
            [
                'id' => 4,
                'name' => 'Четыре',
                'visible' => false,
            ],
        ]);

        DB::table('drugs')->insert([
            [
                'id' => 1,
                'name' => 'Один компонент',
            ],
            [
                'id' => 2,
                'name' => 'Два компонента (1, 2)',
            ],
            [
                'id' => 3,
                'name' => 'Три компонента (1, 2, 3)',
            ],
            [
                'id' => 4,
                'name' => 'Четыре компонента невидимое',
            ],
        ]);

        DB::table('drug_substance')->insert([
            [
                'drug_id' => 1,
                'substance_id' => 1,
            ],
            [
                'drug_id' => 2,
                'substance_id' => 1,
            ],
            [
                'drug_id' => 2,
                'substance_id' => 2,
            ],
            [
                'drug_id' => 3,
                'substance_id' => 1,
            ],
            [
                'drug_id' => 3,
                'substance_id' => 2,
            ],
            [
                'drug_id' => 3,
                'substance_id' => 3,
            ],
            [
                'drug_id' => 4,
                'substance_id' => 1,
            ],
            [
                'drug_id' => 4,
                'substance_id' => 2,
            ],
            [
                'drug_id' => 4,
                'substance_id' => 3,
            ],
            [
                'drug_id' => 4,
                'substance_id' => 4,
            ],
        ]);
    }
}