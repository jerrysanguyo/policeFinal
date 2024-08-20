<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rank;

class RankFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'          =>  $this->faker()->name(),
            'remarks'       =>  $this->faker()->sentece(),
            'created_by'    =>  User::factory(),
            'updated_by'    =>  User::factory(),
        ];
    }
}
