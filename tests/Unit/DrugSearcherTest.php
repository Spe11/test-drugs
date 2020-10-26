<?php

namespace Tests\Unit;

use App\Services\DrugSearcher;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use TestSeeder;

class DrugSearcherTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->runDatabaseMigrations();
        $this->seed(TestSeeder::class);
    }

    public function testSearch()
    {
        $drugs = (new DrugSearcher())->search([1, 2, 3, 4]);
        $names = collect($drugs->items())->pluck('name');

        $this->assertEquals(count($drugs), 2);
        $this->assertContains('Два компонента (1, 2)', $names);
        $this->assertContains('Три компонента (1, 2, 3)', $names);
        $this->assertNotContains('Четыре компонента невидимое', $names);
        $this->assertNotContains('Один компонент', $names);

        $drugs = (new DrugSearcher())->search([1, 2, 3]);

        $this->assertEquals(count($drugs), 1);
        $this->assertEquals($drugs[0]->name, 'Три компонента (1, 2, 3)');

        $drugs = (new DrugSearcher())->search([1, 2]);

        $this->assertEquals(count($drugs), 1);
        $this->assertEquals($drugs[0]->name, 'Два компонента (1, 2)');

        $drugs = (new DrugSearcher())->search([1]);

        $this->assertEquals(count($drugs), 0);
    }
}