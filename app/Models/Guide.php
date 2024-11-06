<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class Guide extends Model
{
    // Declare the fillable property
    protected $fillable = ["name", 'nid', 'email', 'contact', 'address', 'price', 'experience'];

    protected $appends = ['is_favoriteGuide'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getImageAttribute($value)
    {
        return asset('storage/guide/' . $value);
    }

   
    public function tourTypes()
    {
        return $this->belongsToMany(Tourtype::class, 'guide_tourtypes', 'guide_id', 'tourtype_id');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'guide_activities', 'guide_id', 'activity_id');
    }

    public function guideLanguages()
    {
        return $this->belongsToMany(Language::class, 'guide_languages', 'guide_id', 'language_id')->withTimestamps();;
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'guide_private_destinations', 'guide_id', relatedPivotKey: 'place_id')->withTimestamps();
    }

    public function privateDestinations()
    {
        return $this->belongsToMany(Place::class, 'guide_private_destinations', 'guide_id', relatedPivotKey: 'place_id')->withTimestamps()->wherePivot('is_private', true);
    }

    public function otherDestinations()
    {
        return $this->belongsToMany(Place::class, 'guide_private_destinations', 'guide_id', 'place_id')->withTimestamps()->wherePivot('is_private', false);
    }

    public function description()
    {
        return $this->hasOne(GuideDescription::class);
    }

    public function favoritedBy()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getIsFavoriteGuideAttribute()
    {
        $userId = Auth::id();
        return $this->favoritedBy->contains('user_id', $userId);
    }

}