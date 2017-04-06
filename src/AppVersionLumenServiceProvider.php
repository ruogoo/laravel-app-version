<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace HyanCat\AppVersion;

class AppVersionLumenServiceProvider extends AbstractServiceProvider
{
    public function configure()
    {
        $this->app->configure('appversion');
    }

    protected function registerRoute(array $config)
    {
        $this->app->get($config['path'], [
            'middleware' => $config['middleware'],
            'uses'       => $config['uses'],
            'as'         => $config['name'],
        ]);
    }
}
