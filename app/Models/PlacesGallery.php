<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlacesGallery extends Model
{

    protected $table = "places_gallery";

    protected $fillable = ["place_id","image"];
    public function destination()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function getImageAttribute($value)
    {
        return asset('storage/place/' . $value);
    }

    public function getImagesAttribute($value)
    {
        return asset('storage/place/' . $value);
    }

}
