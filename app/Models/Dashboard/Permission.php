<?php

namespace App\Models\Dashboard;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }
}
