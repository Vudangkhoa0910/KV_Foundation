<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'roles';

    protected $fillable = [
        'role_id',
        'role_name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
