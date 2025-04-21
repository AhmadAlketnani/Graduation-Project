<?php

namespace App\Models\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dashboard\Plane;
use App\Models\Dashboard\Store_planes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'facebook',
        'instagram',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'store_id');
    }
    public function planes()
    {
        return $this->hasMany(Plane::class);
    }
    public function store_planes()
    {
        return $this->belongsTo(Store_planes::class, 'store_id');
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    // scopes----------------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->orWhere('facebook', 'like', '%' . $search . '%')
            ->orWhere('instagram', 'like', '%' . $search . '%');
    }
}
