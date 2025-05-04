<?php

namespace App\Models\Dashboard;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_en','name_ar','image'];

    protected $appends = ['image_url', 'name'];


    //* Attributes

    public function getNameAttribute()
    {
        $name = 'name_' . App::currentLocale();
        return $this->$name;
    }//! end of getNameAttribute
    

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
