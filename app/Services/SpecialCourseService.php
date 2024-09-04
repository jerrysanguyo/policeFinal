<?php

namespace App\Services;

use App\Models\SpecialCourse;
use Illuminate\Support\Facades\Auth;

class SpecialCourseService
{
    public function specialCourseStore(array $data): SpecialCourse
    {
        return SpecialCourse::create([
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'created_by'    =>  Auth::id(),
            'updated_by'    =>  Auth::id(),
        ]);
    }
    
    public function specialCourseUpdate(SpecialCourse $special, array $data): SpecialCourse
    {
        $special->update([
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'updated_by'    =>  Auth::id(),
        ]);

        return $special;
    }

    public function specialCourseDestroy(SpecialCourse $special): bool
    {
        return $special->delete();
    }
}
