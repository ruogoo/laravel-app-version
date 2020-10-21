<?php
/**
 * This file is part of Naptime-Server.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogoo\AppVersion;

class AppVersionLaravelServiceProvider extends AbstractServiceProvider
{
    public function configure()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations/' => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__ . '/../config/appversion.php' => config_path('appversion.php'),
            ], 'config');

            $this->mergeConfigFrom(__DIR__ . '/../config/appversion.php', 'appversion');
        }
    }

    protected function registerRoute(array $config)
    {
        $this->app['router']->get($config['path'], [
            'middleware' => $config['middleware'],
            'uses'       => $config['uses'],
            'as'         => $config['name'],
        ]);
    }
}
