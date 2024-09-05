<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateSpecialCourseExtnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'special_id'    =>  ['required', 'numeric', 'exists:special_courses,id'],
            'name'          =>  ['required', 'string', 'max:255'],
            'remarks'       =>  ['required', 'string', 'max:255'],
        ];
    }
}
