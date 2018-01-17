<?php

namespace App\Repositories\Transport;


use App\Interfaces\Transport\ModelsInterface;
use App\Models\CarModel;
use App\Models\CarModelService;

class CarModelRepository implements ModelsInterface
{
    protected $car;
    protected $services = [];
    protected $serviceModel;

    public function __construct(CarModel $car, CarModelService $serviceModel)
    {
        $this->car = $car;
        $this->serviceModel = $serviceModel;
    }

    public function allModels()
    {
        return $this->car->all();
    }

    public function getModelServices($id)
    {
        $services = $this->getModelById($id)->carModelService;

        foreach ($services as $service) {
            $this->services[$service->service_id] = $service;
        }

        return $this->services;
    }

    public function addService($request)
    {
        $model = $this->getModelById($request->model_id);

        $model->carModelService()->save($this->serviceModel->createWithRequest($request));

        flash(trans('model.model_added', ['name' => $model->name]))->success();
    }

    public function deleteService($id)
    {
        $service = $this->serviceModel->getService($id);

        return $service->delete();
    }

    public function getModelById($id)
    {
        return $this->car->getCar($id)->first();
    }
}