<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear cursos
        $daw2 = Course::create([
            'nom' => 'DAW 2',
            'descripcio' => 'Desenvolupament d\'Aplicacions Web - Segon curs',
            'centre' => 'IES Montsia'
        ]);

        $asix2 = Course::create([
            'nom' => 'ASIX2',
            'descripcio' => 'Administració de Sistemes Informàtics en Xarxa',
            'centre' => 'IES Montsia'
        ]);

        $dam2 = Course::create([
            'nom' => 'DAM2',
            'descripcio' => 'Desenvolupament d\'Aplicacions Multiplataforma',
            'centre' => 'IES Montsia'
        ]);

        // Crear estudiants
        Student::create([
            'nom' => 'Joan',
            'cognoms' => 'García López',
            'edat' => 20,
            'course_id' => $daw2->id
        ]);

        Student::create([
            'nom' => 'Maria',
            'cognoms' => 'Pérez Martínez',
            'edat' => 22,
            'course_id' => $daw2->id
        ]);

        Student::create([
            'nom' => 'Pere',
            'cognoms' => 'Sánchez Vila',
            'edat' => 19,
            'course_id' => $asix2->id
        ]);

        Student::create([
            'nom' => 'Laura',
            'cognoms' => 'Rodríguez Ferrer',
            'edat' => 21,
            'course_id' => $asix2->id
        ]);

        Student::create([
            'nom' => 'Marc',
            'cognoms' => 'Fernández Costa',
            'edat' => 23,
            'course_id' => $dam2->id
        ]);

        Student::create([
            'nom' => 'Anna',
            'cognoms' => 'Martí Pujol',
            'edat' => 18,
            'course_id' => null
        ]);

        $this->command->info('✅ Dades de prova creades correctament!');
        $this->command->info('📊 3 Cursos i 6 Estudiants creats.');
    }
}
