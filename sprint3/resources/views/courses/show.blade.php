@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Detalls del Curs</h2>
    <a class="btn btn-secondary" href="{{ route('courses.index') }}">Tornar</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $course->nom }}</h5>
        <p class="card-text"><strong>ID:</strong> {{ $course->id }}</p>
        <p class="card-text"><strong>Nom:</strong> {{ $course->nom }}</p>
        <p class="card-text"><strong>Descripció:</strong> {{ $course->descripcio }}</p>
        <p class="card-text"><strong>Centre:</strong> {{ $course->centre }}</p>
        <p class="card-text"><strong>Creat:</strong> {{ $course->created_at->format('d/m/Y H:i') }}</p>
        <p class="card-text"><strong>Actualitzat:</strong> {{ $course->updated_at->format('d/m/Y H:i') }}</p>
    </div>
    <div class="card-footer">
        <a class="btn btn-warning" href="{{ route('courses.edit', $course) }}">Editar</a>
        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Estàs segur?')">Eliminar</button>
        </form>
    </div>
</div>
@endsection
