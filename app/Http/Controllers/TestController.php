<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelRequest;
use App\Interfaces\Transport\ServiceModelInterface;
use App\Interfaces\Transport\ModelsInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\Transport\CarTrait;

class TestController extends Controller
{
    use CarTrait;

    protected $model;
    protected $service;

    public function __construct(ModelsInterface $model, ServiceModelInterface $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function index()
    {
        return view('welcome');
    }

    public function showAllModels()
    {
        return view($this->viewPath . 'all_models',
                [
                    'allModels' => $this->model->allModels()
                ]
            );
    }

    public function showModelServices($id)
    {
        $services = $this->model->getModelServices($id);

        return view($this->viewPath . 'model_service',
            [
                'services' => $services,
                'model'  => $this->model->getModelById($id),
                'allServices'  => $this->service->servicesArray(),
            ]
        );
    }

    public function addModelService(ModelRequest $request)
    {
        $this->model->addService($request);

//        return redirect()->route($this->routePath . 'service', [$request->input('model_id')]);
        return redirect()->back();
    }

    public function deleteModelService($id)
    {
        return $this->model->deleteService($id);
    }

//    public function store(ModelRequest $request)
//    {
////        return redirect('/cars/models')->with('message', 'Модель успешно добавлена');
//
//        $this->authorize('create', Model::class);
//
//        $carModel = $this->model->create($request->all());
//
//        $this->service->handleUploadedImage($carModel->car_id);
//
//        return redirect()->route('models.store')->with('message', trans('car.model_added', $carModel->name));
//    }
}
