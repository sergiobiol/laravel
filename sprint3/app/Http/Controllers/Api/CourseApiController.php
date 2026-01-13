<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('students')->with('students')->get();
        return response()->json($courses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'required|string',
            'centre' => 'required|string|max:255',
        ]);

        $course = Course::create($request->all());

        return response()->json($course, 201);
    }

    public function show(string $id)
    {
        $course = Course::with('students')->findOrFail($id);
        return response()->json($course);
    }

    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'required|string',
            'centre' => 'required|string|max:255',
        ]);

        $course->update($request->all());

        return response()->json($course);
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully'], 200);
    }
}
