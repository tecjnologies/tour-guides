<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email', 'password', 'contact','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function packages(){
        return $this->hasMany(Package::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public function favouritePlaces()
    {
        return $this->hasMany(Favorite::class)
                    ->whereNotNull('place_id')
                    ->with('place'); // Eager load Place
    }

    public function favouriteGuides()
    {
        return $this->hasMany(Favorite::class)
                    ->whereNotNull('guide_id')
                    ->with('guide'); // Eager load Guide
    }
}

