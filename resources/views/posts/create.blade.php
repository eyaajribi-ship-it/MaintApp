<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Ajouter un nouvel article</h2>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Résumé</label>
            <textarea name="summary" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenu</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <select name="categories[]" class="form-select" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <small class="text-muted">Maintenez Ctrl pour choisir plusieurs catégories</small>
        </div>

        <input type="hidden" name="authorId" value="1">
        <input type="hidden" name="published" value="1">
        <input type="hidden" name="slug" value="test-article">

        <button type="submit" class="btn btn-primary">Créer l'article</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>