<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionName extends Model
{
    protected $table = 'permission_names';
    protected $fillable = [
        'name', 'permission_id',
    ];

}
