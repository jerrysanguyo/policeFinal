<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecielCourseExtensionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'special_id'    =>  SpecialCourse::factory(),
            'name'          =>  $this->faker()->name(),
            'remarks'       =>  $this->faker()->sentence(),
            'created_by'    =>  User::factory(),
            'updated_by'    =>  User::factory(),
        ];
    }
}
