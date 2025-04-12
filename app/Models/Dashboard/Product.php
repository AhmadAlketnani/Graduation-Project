<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'images', 'QTY', 'description', 'status', 'store_id', 'Category_id'];

    protected $appends = ['image_url'];
    protected $casts = [
        'images' => 'array'
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';





    public function scopeWhenStores($query, $store_id)
    {
        return $query->when($store_id, function ($q) use ($store_id) {
            return $q->whereHas('store', function ($qy) use ($store_id) {
                return $qy->where('store_id', $store_id)
                    ->orWhere('name', $store_id);

            });
        });
    }
    public function scopeWhenCategorise($query, $Category_id)
    {
        return $query->when($Category_id, function ($q) use ($Category_id) {
            return $q->whereHas('Category', function ($qy) use ($Category_id) {
                return $qy->where('Category_id', $Category_id)
                    ->orWhere('name', $Category_id);

            });
        });
    }
// relationships-----------------------------------
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id' );
    }
    public function getImageUrlAttribute()
    {
        return $this->images ? asset('storage/' . $this->images[0]) : null;
    }

    // scopes-----------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }
}
