<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace HyanCat\AppVersion;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppVersionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('hyancat.appversion', function ($app) {
            //
        });
        Route::get('/app/version');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/appversion.php' => config_path('appversion.php'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../migrations/' => base_path('/database/migrations'),
        ], 'migrations');
    }

    public function provides()
    {
        return ['hyancat.appversion'];
    }
}
