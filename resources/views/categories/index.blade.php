@extends('layouts.application')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Catégories</h1>
    <a href="#" class="btn btn-success">Nouvelle Catégorie</a>
</div>

<table class="table table-hover">
    <thead class="table-light">
        <tr>
            <th>Titre</th>
            <th>Slug</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{ $category->title }}</td>
            <td><code>{{ $category->slug }}</code></td>
            <td>{{ Str::limit($category->content, 50) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Aucune catégorie trouvée.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection