<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('students')->latest()->paginate(5);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'descripcio' => 'required',
            'centre' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Curs creat correctament.');
    }

    public function show(Course $course)
    {
        $course->load('students');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'nom' => 'required',
            'descripcio' => 'required',
            'centre' => 'required',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Curs actualitzat correctament.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curs eliminat correctament.');
    }
    
    public function exportCsv()
    {
        $courses = Course::all();
        
        $filename = 'courses_' . date('Y-m-d_H-i-s') . '.csv';
        $handle = fopen('php://output', 'w');
        
        ob_start();
        
        // CSV headers
        fputcsv($handle, ['ID', 'Nom', 'Descripció', 'Centre', 'Created At', 'Updated At']);
        
        // CSV data
        foreach ($courses as $course) {
            fputcsv($handle, [
                $course->id,
                $course->nom,
                $course->descripcio,
                $course->centre,
                $course->created_at,
                $course->updated_at,
            ]);
        }
        
        fclose($handle);
        $csv = ob_get_clean();
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
    
    public function exportCoursesWithStudents()
    {
        $courses = Course::with('students')->get();
        
        $filename = 'courses_with_students_' . date('Y-m-d_H-i-s') . '.csv';
        $handle = fopen('php://output', 'w');
        
        ob_start();
        
        // CSV headers
        fputcsv($handle, ['Course ID', 'Course Name', 'Descripció', 'Centre', 'Student ID', 'Student Name', 'Student Cognoms', 'Student Edat']);
        
        // CSV data
        foreach ($courses as $course) {
            if ($course->students->count() > 0) {
                foreach ($course->students as $student) {
                    fputcsv($handle, [
                        $course->id,
                        $course->nom,
                        $course->descripcio,
                        $course->centre,
                        $student->id,
                        $student->nom,
                        $student->cognoms,
                        $student->edat,
                    ]);
                }
            } else {
                // Course without students
                fputcsv($handle, [
                    $course->id,
                    $course->nom,
                    $course->descripcio,
                    $course->centre,
                    '',
                    'Sense estudiants',
                    '',
                    '',
                ]);
            }
        }
        
        fclose($handle);
        $csv = ob_get_clean();
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
