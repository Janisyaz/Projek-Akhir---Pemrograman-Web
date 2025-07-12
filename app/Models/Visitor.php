<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'user_agent', 'article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}