<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateSpecialTrainingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'admin_course'      => ['required', 'string', 'exists:special_courses,id'],
            'admin_training'    => ['required', 'string', 'exists:special_course_extensions,id'],
            'class_number'      => ['required', 'string', 'max:255'],
            'duration'          => ['required', 'numeric'],
            'height'            => ['required', 'numeric'],
        ];
    }
}
