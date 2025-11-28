@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Llista d'Estudiants</h2>
    <a class="btn btn-primary" href="{{ route('students.create') }}">Crear Estudiant</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Cognoms</th>
        <th>Edat</th>
        <th>Accions</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->nom }}</td>
        <td>{{ $student->cognoms }}</td>
        <td>{{ $student->edat }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('students.show', $student) }}">Veure</a>
            <a class="btn btn-warning btn-sm" href="{{ route('students.edit', $student) }}">Editar</a>
            <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $students->links() !!}
@endsection
