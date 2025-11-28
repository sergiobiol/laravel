@extends('layouts.app')

@section('content')
<h2>Crear Curs</h2>

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

<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom del Curs</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
    </div>
    <div class="mb-3">
        <label>Descripció</label>
        <textarea name="descripcio" class="form-control" rows="4" required>{{ old('descripcio') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Centre</label>
        <input type="text" name="centre" class="form-control" value="{{ old('centre') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection
