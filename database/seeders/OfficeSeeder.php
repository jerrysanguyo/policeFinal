<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    public function run(): void
    {
        $offices = [
            'office 1',
            'office 2'
        ];

        foreach ($offices as $office) {
            Office::create([
                'name'          =>  $office,
                'remarks'       =>  'Seeder generated',
                'created_by'    =>  1,
                'updated_by'    =>  1,
            ]);
        }
    }
}
