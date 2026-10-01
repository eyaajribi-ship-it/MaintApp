<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostComment extends Model
{
    use HasFactory;

    protected $fillable = ['postId', 'parentId', 'title', 'published', 'publishedAt', 'content'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'postId');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(PostComment::class, 'parentId');
    }
}