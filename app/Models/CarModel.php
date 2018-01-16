<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car_model';

    protected $guarded = [
        "model_id"
    ];

//    protected $fillable = [
//        'name',//string('name', 30)
//        'alias',//string('alias', 30)
//        'actuality',//tinyInteger('actuality')->unsigned()
//    ];

    public function carModelService()
    {
        return $this->hasMany('App\Models\CarModelService', 'model_id', 'model_id');
    }

    public function scopeGetCar($query, $id)
    {
        return $query->with('carModelService')
            ->where('model_id', $id);
    }


}
