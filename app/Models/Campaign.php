<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'campaigns';

    protected $fillable = [
        'title',
        'description',
        'goal_amount',
        'current_amount',
        'end_date',
        'image',
        'user_id',
        'status'
    ];

    protected $casts = [
        'end_date' => 'datetime',
        'goal_amount' => 'float',
        'current_amount' => 'float'
    ];

    /**
     * Get the user that created the campaign
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the donations for the campaign
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Calculate the progress percentage of the campaign
     */
    public function getProgressPercentageAttribute()
    {
        return ($this->current_amount / $this->goal_amount) * 100;
    }

    /**
     * Check if the campaign is active
     */
    public function isActive()
    {
        return $this->status === 'active' && $this->end_date->isFuture();
    }

    /**
     * Scope a query to only include active campaigns
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('end_date', '>', now());
    }
} 