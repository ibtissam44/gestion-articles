@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $article->titre }}</h2>
    <p><strong>Date:</strong> {{ $article->date }}</p>
    <p>{{ $article->contenu }}</p>

    <hr>

    <h4>Commentaires</h4>
    @forelse ($article->commentaires as $commentaire)
        <div class="mb-3 p-3 border rounded">
            <strong>{{ $commentaire->user->name }}</strong> 
            <span class="text-muted">({{ $commentaire->date }})</span>
            <p>{{ $commentaire->contenu }}</p>
        </div>
    @empty
        <p>Aucun commentaire pour le moment.</p>
    @endforelse

    <hr>

    @auth
    <h5>Ajouter un commentaire</h5>
    <form action="{{ route('commentaires.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="mb-3">
            <textarea name="contenu" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Commenter</button>
    </form>
    @else
        <p><a href="{{ route('login') }}">Connectez-vous</a> pour ajouter un commentaire.</p>
    @endauth
</div>
@endsection
