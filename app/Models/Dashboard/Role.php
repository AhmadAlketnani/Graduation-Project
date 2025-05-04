<?php

namespace App\Models\Dashboard;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name_en','name_ar',];

    protected $appends = ['name'];

    //* Attributes

    public function getNameAttribute()
    {
        $name = 'name_' . App::currentLocale();
        return $this->$name;
    }//! end of getNameAttribute

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
