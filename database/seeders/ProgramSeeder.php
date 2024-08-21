<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            'Public safety basic recruit course (PSBRC)',
            'Public safety field training program (PSFTP)',
            'Public safety junior leadership course (PSJLC)',
            'Public safety senior leadership course (PSSLC)',
            'Public safety officer candidate course (PSOCC)',
            'Public safety safety officer basic course (PSSOBC)',
        ];

        foreach ($programs as $program) {
            Program::create([
                'name'          =>  $program,
                'remarks'       =>  'Seeder generated',
                'created_by'    =>  1,
                'updated_by'    =>  1,
            ]);
        }
    }
}
