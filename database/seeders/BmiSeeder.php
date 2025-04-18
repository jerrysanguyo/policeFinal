<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bmi;

class BmiSeeder extends Seeder
{
    public function run(): void
    {
        $bmis = [
            'Obese 3',
            'Obese 2',
            'Obese 1',
            'Overweight',
            'Normal weight',
            'Underweight',
        ];

        foreach ($bmis as $bmi) {
            Bmi::create([
                'name'          =>  $bmi,
                'remarks'       =>  'Seeder generated',
                'created_by'    =>  1,
                'updated_by'    =>  1,
            ]);
        }
    }
}
