@extends('layouts.application')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Liste des Utilisateurs</h1>
    <a href="#" class="btn btn-primary">Ajouter un Utilisateur</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Inscrit le</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstName }} {{ $user->lastName }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile ?? 'Non renseigné' }}</td>
            <td>{{ $user->registeredAt }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection