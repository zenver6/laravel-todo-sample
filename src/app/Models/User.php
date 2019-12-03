<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // 主キー設定
    protected $primaryKey = 'user_id';

    public function folders()
    {
        return $this->hasMany('App\Models\Folder', 'user_id', 'user_id');
    }
}
