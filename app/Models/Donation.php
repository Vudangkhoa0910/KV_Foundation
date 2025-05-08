<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'donations';

    protected $fillable = [
        'user_id',
        'campaign_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status'
    ];

    protected $casts = [
        'amount' => 'float'
    ];

    /**
     * Get the user that made the donation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the campaign that received the donation
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Scope a query to only include successful donations
     */
    public function scopeSuccessful($query)
    {
        return $query->where('status', 'completed');
    }
} 