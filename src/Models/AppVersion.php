<?php
/**
 * This file is part of laravel-app-version.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogoo\AppVersion\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AppVersion
 * @namespace Ruogoo\AppVersion\Models
 * @property integer id
 * @property string  bundle_id
 * @property string  platform
 * @property string  version
 * @property string?  title
 * @property string  detail
 * @property string?  url
 * @property string?  level
 * @property string?  options
 */
class AppVersion extends Model
{
    protected $guarded = [];
    protected $hidden  = ['id', 'bundle_id', 'platform', 'created_at', 'updated_at'];

    protected $casts = ['options'];
}
