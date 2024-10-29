<?php

namespace App\Models;

use App\View\Components\home\TourGuide;
use Illuminate\Database\Eloquent\Model;

class Tourtype extends Model
{
    public function guides(){
        return $this->hasMany(TourGuide::class);
    }
}
