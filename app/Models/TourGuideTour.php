<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuideTour extends Model
{
    use HasFactory;
    protected $fillable = ['tour_guide_id', 'tour_id'];

    public function tourGuide()
    {
        return $this->belongsTo(User::class, 'tour_guide_id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
