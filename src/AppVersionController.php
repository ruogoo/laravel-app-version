<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace HyanCat\AppVersion;

use HyanCat\AppVersion\Models\AppVersion\AppVersion;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

final class AppVersionController extends Controller
{
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function version(Request $request)
    {
        $platform   = $request->get('platform');
        $appVersion = $request->get('app_version');

        return $this->_checkPlatformVersion($platform, $appVersion);
    }

    private function _checkPlatformVersion($platform, $appVersion)
    {
        $model    = $this->config->get('appversion.model');
        $versions = $model::where('platform', $platform)->get();

        return $this->_matchVersion($appVersion, $versions);
    }

    private function _matchVersion($appVersion, $versions)
    {
        foreach ($versions as $version) {
            if (version_compare($appVersion, $version->version) < 0) {
                return $version;
            }
        }
    }
}
