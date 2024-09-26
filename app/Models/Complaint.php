<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = ['tour_booking_id', 'content'];

    public function tourBooking()
    {
        return $this->belongsTo(TourBooking::class, 'tour_booking_id');
    }
}
