<?php

namespace App\Models\Dashboard;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = ['name','image'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute($val)
    {
        return Storage::disk('public')->url($this->image);
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
