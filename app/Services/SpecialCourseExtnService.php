<?php

namespace App\Services;

use App\Models\SpecialCourseExtension;
use Illuminate\Support\Facades\Auth;

class SpecialCourseExtnService
{
    public function specialCourseExtnStore(array $data): SpecialCourseExtension
    {
        return SpecialCourseExtension::create([
            'special_id'    =>  $data['special_id'],
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'created_by'    =>  Auth::id(),
            'updated_by'    =>  Auth::id(),
        ]);
    }
    
    public function specialCourseExtnUpdate(SpecialCourseExtension $specialExtn, array $data): SpecialCourseExtension
    {
        $specialExtn->update([
            'special_id'    =>  $data['special_id'],
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'updated_by'    =>  Auth::id(),
        ]);

        return $specialExtn;
    }

    public function specialCourseExtnDestroy(SpecialCourseExtension $specialExtn): bool
    {
        return $specialExtn->delete();
    }
}
