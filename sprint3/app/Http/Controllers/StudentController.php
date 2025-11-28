<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'edat' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiant creat correctament.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'edat' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiant actualitzat correctament.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiant eliminat correctament.');
    }
}
