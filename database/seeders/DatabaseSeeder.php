<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            OfficeSeeder::class,
            ProgramSeeder::class, 
            RankSeeder::class,
            SpecialCourseSeeder::class,
        ]);
    }
}
