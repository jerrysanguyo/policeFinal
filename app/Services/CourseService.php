<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Support\Fascade\Auth;

class CourseService
{
    public function courseStore(array $data, int $userId): void
    {
        foreach ($data['program'] as $index => $programId) {
            Course::create([
                'user_id'      => $userId,
                'program_id'   => $programId,
                'class_number' => $data['class_number'][$index],
                'duration'     => $data['duration'][$index],
                'ranking'      => $data['rank'][$index],
            ]);
        }
    }

    public function courseUpdate (array $data, int $userId): Course
    {
        $course->update([
            'program_id'   => $programId,
            'class_number' => $data['class_number'],
            'duration'     => $data['duration'],
            'ranking'      => $data['rank'],
        ]);

        return $course;
    }
}