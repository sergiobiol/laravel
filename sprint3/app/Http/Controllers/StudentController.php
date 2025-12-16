<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->latest()->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'edat' => 'required',
            'course_id' => 'nullable|exists:courses,id',
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
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'edat' => 'required',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Estudiant actualitzat correctament.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiant eliminat correctament.');
    }
    
    public function exportCsv()
    {
        $students = Student::with('course')->get();
        
        $filename = 'students_' . date('Y-m-d_H-i-s') . '.csv';
        $handle = fopen('php://output', 'w');
        
        ob_start();
        
        // CSV headers
        fputcsv($handle, ['ID', 'Nom', 'Cognoms', 'Edat', 'Curs', 'Created At', 'Updated At']);
        
        // CSV data
        foreach ($students as $student) {
            fputcsv($handle, [
                $student->id,
                $student->nom,
                $student->cognoms,
                $student->edat,
                $student->course ? $student->course->nom : 'Sense curs',
                $student->created_at,
                $student->updated_at,
            ]);
        }
        
        fclose($handle);
        $csv = ob_get_clean();
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
