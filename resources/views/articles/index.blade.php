@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des articles</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Ajouter un nouvel article</a>

    @foreach ($articles as $article)
    <div class="card mb-3">
    <div class="card-body">
    <h5>{{ $article->titre }}</h5>
    <p><strong>Date :</strong> {{ $article->date }}</p>
    <p><strong>Auteur:</strong> {{ optional($article->user)->name ?? 'Nom inconnu' }}</p>
    <p>{{ $article->contenu }}</p>

    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Voir</a>
    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>

    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
    </form>
</div>

    </div>
    @endforeach
</div>
@endsection
