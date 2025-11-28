@extends('layouts.app')

@section('content')
<h2>Editar Estudiant</h2>

<a class="btn btn-secondary mb-3" href="{{ route('students.index') }}">Tornar</a>

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

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" value="{{ $student->nom }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Cognoms</label>
        <input type="text" name="cognoms" value="{{ $student->cognoms }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Edat</label>
        <input type="number" name="edat" value="{{ $student->edat }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualitzar</button>
</form>
@endsection
