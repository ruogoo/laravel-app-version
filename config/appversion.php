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
        'uses'        => \HyanCat\AppVersion\AppVersionController::class . '@version',
        'middleware' => [
            //
        ],
    ],
    'model' => \HyanCat\AppVersion\Models\AppVersion::class,
];
