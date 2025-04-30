<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'date',
        'user_id'
    ];

    

    /**
     * Get the user that owns the article.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the article.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
