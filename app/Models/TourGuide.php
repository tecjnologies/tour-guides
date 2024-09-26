<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'license_id',
        'hourly_price',
        'country',
        'nationality',
        'verified',
        'approved',
        'suspended',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified' => 'boolean',
        'approved' => 'boolean',
        'suspended' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
