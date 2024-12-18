<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    use HasFactory;

    protected $table = "user_favourite";
    protected $fillable = ['user_id', 'place_id','guide_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
    
    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id');
    }

}