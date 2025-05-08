<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    /** @use HasFactory<\Database\Factories\PostCategoryFactory> */
    use HasFactory;

    protected $primaryKey = 'post_category_id';
    protected $guarded = [];

    // model has no timestamps
    public $timestamps = false;

    /*
     * Define relationships
     */
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'post_category_id');
    }
}
