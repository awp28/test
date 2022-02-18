<?php

namespace App\Providers;

use App\Models\CovidCase;
use App\Observers\CovidCaseObserver;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();    //  "data":  shu narsasiz chiqadi insomniyada
        CovidCase::observe(CovidCaseObserver::class);
    }
}
