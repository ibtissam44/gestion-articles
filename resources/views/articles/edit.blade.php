@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'article</h2>
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" value="{{ $article->titre }}" required>



            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" id="date" value="{{ $article->date }}" required>


        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" name="contenu" id="contenu" rows="5" required>{{ $article->contenu }}</textarea>
        </div>

        <div class="mb-3">
            <label for="user" class="form-label">Auteur</label>
            <p>{{ optional($article->user)->name ?? 'Nom inconnu' }}</p>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
