<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTiming extends Model
{
    use HasFactory;
    protected $fillable = ['tour_guide_id', 'available_from', 'available_to'];

    public function tourGuide()
    {
        return $this->belongsTo(User::class, 'tour_guide_id');
    }
}
