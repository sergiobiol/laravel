<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('course')->get();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'cognoms' => 'required|string|max:255',
            'edat' => 'required|integer',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $student = Student::create($request->all());
        $student->load('course');

        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('course')->findOrFail($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        
        $request->validate([
            'nom' => 'required|string|max:255',
            'cognoms' => 'required|string|max:255',
            'edat' => 'required|integer',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $student->update($request->all());
        $student->load('course');

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
