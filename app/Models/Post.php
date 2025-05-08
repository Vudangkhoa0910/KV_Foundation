<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';
    protected $guarded = [];

    /*
     * Define relationships
     */
    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'post_category_id');
    }

    /*
     * Define extra attributes
     */

    /**
     * If excerpt is unavailable (null), show 50 chars of post body
     * @return string
     */
    public function getExcerptAttribute(): string
    {
        if (isset($this->attributes['post_excerpt'])) {
            return $this->attributes['post_excerpt'];
        }
        return Str::limit($this->post_body, 50);
    }
}
