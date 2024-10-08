<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['name','code'];

    public function guides()
    {
        return $this->belongsToMany(Guide::class, 'guide_languages', 'language_id', 'guide_id');
    }    

}
