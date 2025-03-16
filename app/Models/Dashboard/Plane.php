<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['name', 'price', 'product_numbers', 'period', 'status'];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    //  scopes----------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }
}
