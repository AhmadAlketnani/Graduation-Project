<?php

namespace App\Models\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
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
        return $this->belongsTo(User::class);
    }

    // scopes----------------------------------------------
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->orWhere('facebook', 'like', '%' . $search . '%')
            ->orWhere('instagram', 'like', '%' . $search . '%');
    }
}
