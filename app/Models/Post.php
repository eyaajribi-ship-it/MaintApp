<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    // On le laisse une seule fois ici
    public $timestamps = false; 

    protected $fillable = [
        'authorId', 
        'parentId', 
        'title', 
        'metaTitle', 
        'slug', 
        'summary', 
        'published', 
        'createdAt', 
        'updatedAt', 
        'publishedAt', 
        'content'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'authorId');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'postId');
    }

    public function metas(): HasMany
    {
        return $this->hasMany(PostMeta::class, 'postId');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category', 'postId', 'categoryId');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'postId', 'tagId');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parentId');
    }
}