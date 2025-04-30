<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'date',
        'user_id',
        'article_id'
    ];

    /**
     * Get the user that made the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the article that was commented on.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}