<?php

namespace App\Providers\Transport;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Задаём, отложена ли загрузка провайдера.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\Transport\ModelsInterface',
            'App\Repositories\Transport\CarModelRepository'
        );

        $this->app->bind(
            'App\Interfaces\Transport\ServiceModelInterface',
            'App\Repositories\Transport\CarServiceModelRepository'
        );
    }

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Interfaces\Transport\ModelsInterface', 'App\Interfaces\Transport\ServiceModelInterface'];
    }
}
