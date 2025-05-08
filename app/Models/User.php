<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'display_name',
        'user_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guarded = [];
    protected $primaryKey = '_id';

    /*
     * Define relationships
     */
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }

    /**
     * Get the campaigns created by the user
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * Get the donations made by the user
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Calculate the total amount donated by the user
     */
    public function getTotalDonatedAttribute()
    {
        return $this->donations()->successful()->sum('amount');
    }

    /*
     * Define attributes
     */

    /**
     * Return display name if not null, otherwise return username
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->display_name ?? $this->user_name;
    }

    /**
     * Return if the user is admin or not
     * @return bool
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->role_id == 1;
    }

    /*
     * Define model events
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (is_null($user->role_id)) {
                $user->role_id = 2; // assign user role by default
            }
        });
    }
}
