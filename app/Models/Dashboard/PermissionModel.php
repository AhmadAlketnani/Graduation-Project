<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    protected $table = 'permission_models';
    protected $fillable = ['name'];

    const CREATE_ACTION = 'create';
    const READ_ACTION = 'read';
    const UPDATE_ACTION = 'update';
    const DELETE_ACTION = 'delete';
}
