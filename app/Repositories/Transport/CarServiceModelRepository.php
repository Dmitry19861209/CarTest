<?php

namespace App\Repositories\Transport;


use App\Interfaces\Transport\ServiceModelInterface;
use App\Models\CarModelService;

class CarServiceModelRepository implements ServiceModelInterface
{
    protected $carService;

    public function __construct(CarModelService $carService)
    {
        $this->carService = $carService;
    }

    public function servicesArray()
    {
        return $this->carService->servicesArray();
    }
}