<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequests extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'program_id'    => ['numeric', 'exists:programs,id'],  
            'class_number'  => ['string', 'required', 'max:255'],  
            'duration'      => ['numeric', 'required'],            
            'ranking'       => ['numeric', 'required'],
        ];
    }
}
