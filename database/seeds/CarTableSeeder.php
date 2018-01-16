<?php

use App\Models\CarModel;
use App\Models\CarModelService;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarTableSeeder extends Seeder
{
    protected $carModel;
    protected $carModelService;

    public function __construct(CarModel $carModel, CarModelService $carModelService)
    {
        $this->carModel = $carModel;
        $this->carModelService = $carModelService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('car_model_service')->truncate();
        DB::table('car_model')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        foreach ($this->getCarModelData() as $item) {
            $this->carModel->create($item);
        }

        foreach ($this->CarModelServiceData() as $item) {
            $this->carModelService->create($item);
        }
    }

    public function getCarModelData()
    {
        $data = [
            [
                "name" => "AUDI",
                "alias" => "audi",
                "actuality" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => null,
            ],
            [
                "name" => "LEXUS",
                "alias" => "lexus",
                "actuality" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => null,
            ],
            [
                "name" => "TOYOTA",
                "alias" => "toyota",
                "actuality" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => null,
            ],
        ];

        return $data;
    }

    public function CarModelServiceData()
    {
        $data = [
            [
                "model_id" => 1,
                "service_name" => "Покраска",
                "price" => "50000",
                "created_at" => Carbon::now(),
                "updated_at" => null,
            ],
            [
                "model_id" => 1,
                "service_name" => "Шиномонтаж",
                "price" => "2500",
                "created_at" => Carbon::now(),
                "updated_at" => null,
            ],
            [
                "model_id" => 2,
                "service_name" => "Кузовные работы",
                "price" => "70000",
                "created_at" => Carbon::now(),
                "updated_at" => null,
            ],
        ];

        return $data;
    }
}
