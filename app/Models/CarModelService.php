<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CarModelService extends Model
{
    protected $table = 'car_model_service';

    protected $guarded = [
        "service_id"
    ];

    const PAINTING = "Покраска"; //1
    const TIRE = "Шиномонтаж"; //2
    const BODY_WORK = "Кузовные работы"; //3
    const TO = "ТО"; //4
    const WASHING = "Мойка"; //5

//        protected $fillable = [
//        'model_id'//tinyInteger('model_id')->unsigned()
//        'service_name',//string('name', 30)
//        'price',//string('price', 30)
//    ];

    public function servicesArray()
    {
        return [
            self::PAINTING,
            self::TIRE,
            self::BODY_WORK,
            self::TO,
            self::WASHING,
        ];
    }

    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel', 'model_id', 'model_id');
    }

    public function scopeGetService($query, $id)
    {
        return $query->where('service_id', $id);
    }

    public function createWithRequest($request)
    {
        $data = $request->all();
        $data['service_name'] = $this->servicesArray()[$request->input('service_name') - 1];
        unset($data['_token']);
        return $this->firstOrNew($data);
    }

//    public function getServiceById($id)
//    {
//        return $this->getService($id);
//    }
}
