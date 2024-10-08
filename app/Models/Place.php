<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
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

    public function getImageAttribute($value)
    {
        return asset('storage/place/' . $value);
    }
}
