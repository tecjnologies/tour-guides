<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";
    protected $fillable = ['title',  'image', 'isActive'];
    
    protected $casts = [
        'name' => 'string',
        'image' => 'string',
        'isActive' => 'boolean',
    ];


    public function guides()
    {
        return $this->belongsToMany(Guide::class, 'guide_activities', 'activity_id', 'guide_id');
    }
    
    public function getImageAttribute($value)
    {
        return asset('storage/activity/' . $value);
    }


}