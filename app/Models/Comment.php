<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'content', 'article_id', 'approved'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}