<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideDescription extends Model
{
    use HasFactory;

    protected $table = 'guide_descriptions';

    protected $fillable = [
        'guide_id',
        'isCertified',
        'highRatings',
        'responsiveGuide',
        'no_of_slots',
        'response_time',
        'description',
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}