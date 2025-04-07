<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Plane extends Model
{
    protected $fillable = ['name', 'price', 'product_numbers', 'period', 'status'];

    protected $casts = ['created_at' => 'datetime'
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';


    // Attributes----------------------------------
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }// end of getNameAttributes

    public function Store(){
        return $this->hasMany(Store_planes::class);
    }
    public function Store_planes(){
        return $this->belongsTo(Store_planes::class, 'planes_id');
    }
    //  scopes----------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }
}
