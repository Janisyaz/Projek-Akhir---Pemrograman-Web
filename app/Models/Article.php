<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category_id',
        'user_id',
        'published',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function incrementViews()
    // {
    //     $this->views++;
    //     $this->save();
    // }
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function getIsPublishedAttribute()
    {
        return !is_null($this->published_at);
    }

    public function incrementViews()
    {
        $this->timestamps = false;
        $this->increment('views');
        $this->timestamps = true;
    }
}