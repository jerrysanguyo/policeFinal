<?php

namespace App\Services;

use App\Models\SpecialTraining;
use Illuminate\Support\Facades\Auth;

class SpecialTrainingService
{
    public function store(array $data, int $userId): void
    {
        foreach ($data['admin_course'] as $key => $adminCourse) {
            SpecialTraining::create([
                'user_id'           => $userId,
                'admin_course'      =>  $adminCourse,
                'admin_training'    =>  $data['admin_training'][$key],
                'class_number'      =>  $data['class_number'][$key],
                'start_date'        =>  $data['start_date'][$key],
                'end_date'          =>  $data['end_date'][$key],
            ]);
        }
    }

    public function update(array $data, int $userId, $training): SpecialTraining
    {
        $training->update([
            'admin_course'      =>  $data['admin_course'],
            'admin_training'    =>  $data['admin_training'],
            'class_number'      =>  $data['class_number'],
            'start_date'        =>  $data['start_date'],
            'end_date'          =>  $data['end_date'],
        ]);
        
        return $training;
    }

    public function destroy($training): SpecialTraining
    {
        $training->delete();

        return $training;
    }
}