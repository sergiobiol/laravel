<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuari de prova
        User::create([
            'name' => 'sergi',
            'email' => 'sergi@app.local',
            'password' => bcrypt('password123'),
        ]);

        // Dades de prova per Students i Courses
        $this->call([
            DemoDataSeeder::class,
        ]);
    }
}
