<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    // 主キー設定
    protected $primaryKey = 'folder_id';

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'folder_id', 'folder_id');
    }
}
