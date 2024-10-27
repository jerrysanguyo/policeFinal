<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportUserCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'admin_course'  =>  ['required', 'integer', 'exists:special_courses,id'],
        ];
    }
}
