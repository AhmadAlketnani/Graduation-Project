<?php

namespace App\Models\Dashboard;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
   use HasFactory;
    protected $fillable = ['name_en','name_ar', 'price', 'images', 'QTY', 'description_en','description_ar', 'status', 'store_id'];

    protected $appends = ['images_url'];
    protected $casts = [
        'images' => 'array'
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';


    public function getImagesUrlAttribute()
    {
        $images = [];
        foreach ($this->images as $image) {
            $images[] = filter_var($image, FILTER_VALIDATE_URL) ? $image : Storage::disk('public')->url($image);
        }

        return $images;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

// relationships-----------------------------------
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_category' );
    }

    // scopes-----------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name_en', 'like', "%$search%");
        });

    }

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
}
