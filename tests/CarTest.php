<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

        /* Проверим наличие моделей */
        $this->seeInDatabase('car_model', ['name' => 'AUDI']);
        $this->seeInDatabase('car_model', ['name' => 'LEXUS']);
        $this->seeInDatabase('car_model', ['name' => 'TOYOTA']);

        /* Создать по паре строк в моделях и их сервисах */
        factory(App\Models\CarModelService::class, 2)->create();
    }
}
