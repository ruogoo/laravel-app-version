<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace HyanCat\AppVersion;

use Illuminate\Support\ServiceProvider;

abstract class AbstractServiceProvider extends ServiceProvider
{
    protected $router;
    protected $config;

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->configure();
        $config = $this->app['config']->get('appversion.route');
        $this->registerRoute($config);
    }

    abstract public function configure();

    abstract protected function registerRoute(array $config);
}
