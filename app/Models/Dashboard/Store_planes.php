<?php

namespace App\Models\Dashboard;

use App\Models\Dashboard\Plane;
use App\Models\Dashboard\Store;
use Illuminate\Database\Eloquent\Model;

class Store_planes extends Model
{
    protected $fillable = [
        'store_id',
        'planes_id',
        'start_date',
        'end_date',
        'product_insert',
    ];
    public function store()
    {
        return $this->hasMany(Store::class, 'store_id');
    }
    public function planes()
    {
        return $this->hasMany(Plane::class, 'planes_id');
    }

}
