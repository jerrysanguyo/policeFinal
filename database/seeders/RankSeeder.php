<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rank;

class RankSeeder extends Seeder
{
    public function run(): void
    {
        $ranks = [
            'PCOL',
            'PLTCOL',
            'PMAJ',
            'PCPT',
            'PLT',
            'PEMS',
            'PCMS',
            'PSMS',
            'PMSg.',
            'PSSg.',
            'PCpl',
            'Pat',
        ];

        foreach ($ranks as $rank) {
            Rank::create([
                'name'          =>  $rank,
                'remarks'       =>  'Seeder generated',
                'created_by'    =>  1,
                'updated_by'    =>  1,
            ]);
        }
    }
}
