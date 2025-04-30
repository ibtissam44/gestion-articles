<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Afficher la liste des articles.
     */

    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
{
    $article = Article::with(['user', 'commentaires.user'])->findOrFail($id);
    return view('articles.show', compact('article'));
}


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'date' => 'required|date',
            'contenu' => 'required|string',
        ]);
    

        $article = new Article($request->all());
        $article->user_id = Auth::id(); 
        $article->save();
    
        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }


    public function edit($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Article non trouvé');
        }
        return view('articles.edit', compact('article'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'contenu' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}

