<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        Commentaire::create([
            'contenu' => $request->contenu,
            'date' => now()->toDateString(),
            'user_id' => Auth::id(),
            'article_id' => $request->article_id,
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }
}
