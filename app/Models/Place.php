<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Place extends Model
{

    protected $appends = ['is_favorite'];
 
    public function placetype(){
        return $this->belongsTo(Placetype::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function packages(){
        return $this->belongsToMany(Package::class);
    }

    public function guides()
    {
        return $this->belongsToMany(Guide::class, 'guide_private_destinations', 'place_id', 'guide_id');
    }

    public function gallery()
    {
        return $this->hasMany(PlacesGallery::class, 'place_id');
    }

    public function getImageAttribute($value)
    {
        return asset('storage/place/' . $value);
    }

    public function favoritedBy()
    {
        return $this->hasMany(Favorite::class);
    }
    

    public function getIsFavoriteAttribute()
    {
        $userId = Auth::id();
        return $this->favoritedBy->contains('user_id', $userId);
    }
}
