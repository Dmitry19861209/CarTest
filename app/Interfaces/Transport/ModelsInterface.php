<?php

namespace App\Interfaces\Transport;


interface ModelsInterface
{
    public function allModels();
    public function getModelName($id);
    public function getModelServices($id);
    public function getModelById($id);
    public function addService($id);
    public function deleteService($id);
}