<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace HyanCat\AppVersion;

use HyanCat\AppVersion\Exceptions\ValidateException;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

final class AppVersionController extends Controller
{
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws ValidateException
     */
    public function version(Request $request)
    {
        $this->validate($request);

        $platform   = $request->get('platform');
        $bundleID   = $request->get('bundle_id', '');
        $appVersion = $request->get('version');

        $version = $this->checkPlatformVersion($platform, $bundleID, $appVersion);

        return $version ?: Response::create(null, 204);
    }

    /**
     * @param Request $request
     * @throws ValidateException
     */
    private function validate(Request $request)
    {
        $validator = app('validator')->make($request->all(), [
            'platform' => 'required',
            'version'  => 'required',
        ]);
        if ($validator->fails()) {
            throw new ValidateException();
        }
    }

    private function checkPlatformVersion(string $platform, string $bundleID, string $appVersion)
    {
        $model    = $this->config->get('appversion.model');
        $versions = $model::where('platform', $platform)->where('bundle_id', $bundleID)->latest()->get();

        return $this->matchVersion($appVersion, $versions);
    }

    private function matchVersion(string $appVersion, Collection $compareVersions)
    {
        return $compareVersions->first(function ($v) use ($appVersion) {
            return version_compare($appVersion, $v->version) < 0;
        });
    }
}
