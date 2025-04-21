<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_en','name_ar','image'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute($val)
    {
        return filter_var($this->image, FILTER_VALIDATE_URL) ? $this->image : Storage::disk('public')->url($this->image);
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name_en', 'like', "%$search%");
        });

    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
