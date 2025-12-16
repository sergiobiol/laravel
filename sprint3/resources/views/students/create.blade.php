@extends('layouts.app')

@section('content')
<h2>Crear Estudiant</h2>

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

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
    </div>
    <div class="mb-3">
        <label>Cognoms</label>
        <input type="text" name="cognoms" class="form-control" value="{{ old('cognoms') }}" required>
    </div>
    <div class="mb-3">
        <label>Edat</label>
        <input type="number" name="edat" class="form-control" value="{{ old('edat') }}" required>
    </div>
    <div class="mb-3">
        <label>Curs</label>
        <select name="course_id" class="form-control">
            <option value="">Sense curs</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->nom }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@endsection
