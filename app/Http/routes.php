<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'main', 'uses' => 'TestController@index']);

Route::group(['prefix' => 'cars'], function () {
    Route::get('/', ['as' => 'car.all', 'uses' => 'TestController@showAllModels']);
    Route::get('/{id}/model-service', ['as' => 'car.service', 'uses' => 'TestController@showModelServices']);//car/1/model-service
    Route::post('/add-model-service', ['as' => 'car.service.add', 'uses' => 'TestController@addModelService']);
    Route::post('/delete-model-service/{id}', ['as' => 'car.service.delete', 'uses' => 'TestController@deleteModelService']);
});
