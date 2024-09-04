<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpecialCourse;

class SpecialCourseSeeder extends Seeder
{
    public function run(): void
    {
        $specials = [
            'Investigation Courses',
            'Intelligence Courses',
            'Operational Courses',
            'Administrative Courses',
            'PCR',
        ];

        foreach ($specials as $special) {
            SpecialCourse::create([
                'name'          =>  $special,
                'remarks'       =>  'Seeder generated',
                'created_by'    =>   1,
                'updated_by'    =>  1,
            ]);
        }
    }
}
