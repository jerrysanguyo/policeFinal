<?php

namespace App\Services;

use App\Models\{
    Course,
    CourseExtension,
};
use Illuminate\Support\Facades\Auth;

class CourseService
{
    public function courseStore(array $data, int $userId): void
    {
        foreach ($data['program_id'] as $index => $programId) {
            Course::create([
                'user_id'      => $userId,
                'program_id'   => $programId,
                'class_number' => $data['class_number'][$index],
                'duration'     => $data['duration'][$index],
                'ranking'      => $data['ranking'][$index],
            ]);
        }
    
        // Check if optional data exists before creating CourseExtension
        if (isset($data['high_training'], $data['date_graduation'], $data['order_merit'], $data['ftoc'], $data['qe_result'], $data['date_qualifying'])) {
            CourseExtension::create([
                'user_id'           => $userId,
                'high_training'     => $data['high_training'],
                'date_graduation'   => $data['date_graduation'],
                'order_merit'       => $data['order_merit'],
                'ftoc'              => $data['ftoc'],
                'qe_result'         => $data['qe_result'],
                'date_qualifying'   => $data['date_qualifying'],
            ]);
        }
    }

    public function courseUpdate(Course $course, array $data): Course
    {
        $course->update([
            'program_id'   => $data['program_id'],
            'class_number' => $data['class_number'],
            'duration'     => $data['duration'],
            'ranking'      => $data['ranking'],
        ]);

        return $course;
    }

    public function courseExnUpdate(CourseExtension $courseExn, array $data): CourseExtension
    {
        $courseExn->update([
            'high_training'     =>  $data['high_training'],
            'date_graduation'   =>  $data['date_graduation'],
            'order_merit'       =>  $data['order_merit'],
            'ftoc'              =>  $data['ftoc'],
            'qe_result'         =>  $data['qe_result'],
            'date_qualifying'   =>  $data['date_qualifying'],
        ]);

        return $courseExn;
    }
}