<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

return [
    'route' => [
        'name'        => 'app.version',
        'path'        => '/app/version',
        'uses'        => \Ruogoo\AppVersion\AppVersionController::class . '@version',
        'middleware' => [
            //
        ],
    ],
    'model' => \Ruogoo\AppVersion\Models\AppVersion::class,
];
