<?php

namespace App\Providers;

use App\Models\ManufacturerCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        View::share('brands', ManufacturerCategory::all());
        Schema::defaultStringLength(125);
    }
    
}
