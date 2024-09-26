<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'rating', 'content', 'review_reply_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewReply()
    {
        return $this->belongsTo(Review::class, 'review_reply_id');
    }
}
