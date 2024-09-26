<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;
    protected $fillable = ['tour_guide_tour_id', 'tourist_id', 'booked_at', 'total_price'];

    public function tourGuideTour()
    {
        return $this->belongsTo(TourGuideTour::class, 'tour_guide_tour_id');
    }

    public function tourist()
    {
        return $this->belongsTo(User::class, 'tourist_id');
    }
}
