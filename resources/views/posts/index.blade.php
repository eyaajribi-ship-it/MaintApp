@extends('layouts.application')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des interventions</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-success">+ Ajouter une intervention</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Sujet/equipement</th>
                <th>Description</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->summary }}</td>
                <td>{{ $post->author->firstName ?? 'Auteur' }} {{ $post->author->lastName ?? 'Inconnu' }}</td>                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection