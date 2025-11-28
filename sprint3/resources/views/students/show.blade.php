@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Detalls de l'Estudiant</h2>
    <a class="btn btn-secondary" href="{{ route('students.index') }}">Tornar</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $student->nom }} {{ $student->cognoms }}</h5>
        <p class="card-text"><strong>ID:</strong> {{ $student->id }}</p>
        <p class="card-text"><strong>Nom:</strong> {{ $student->nom }}</p>
        <p class="card-text"><strong>Cognoms:</strong> {{ $student->cognoms }}</p>
        <p class="card-text"><strong>Edat:</strong> {{ $student->edat }} anys</p>
        <p class="card-text"><strong>Creat:</strong> {{ $student->created_at->format('d/m/Y H:i') }}</p>
        <p class="card-text"><strong>Actualitzat:</strong> {{ $student->updated_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a class="btn btn-warning" href="{{ route('students.edit', $student) }}">Editar</a>
        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Estàs segur?')">Eliminar</button>
        </form>
    </div>
</div>
@endsection
