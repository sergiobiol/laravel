@extends('layouts.app')

@section('content')
<h2>Editar Curs</h2>

<a class="btn btn-secondary mb-3" href="{{ route('courses.index') }}">Tornar</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!</strong> Hi ha alguns problemes amb les dades.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('courses.update', $course) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nom del Curs</label>
        <input type="text" name="nom" value="{{ $course->nom }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripció</label>
        <textarea name="descripcio" class="form-control" rows="4" required>{{ $course->descripcio }}</textarea>
    </div>
    <div class="mb-3">
        <label>Centre</label>
        <input type="text" name="centre" value="{{ $course->centre }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualitzar</button>
</form>
@endsection
