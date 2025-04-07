<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'images', 'QTY', 'description', 'status', 'store_id'];

    protected $casts = [
        'images' => 'array'
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';


// relationships-----------------------------------
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id' );
    }
    public function stores()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    // scopes-----------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }
}
