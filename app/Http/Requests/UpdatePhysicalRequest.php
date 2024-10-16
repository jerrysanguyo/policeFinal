<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhysicalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'bmi_result'    => ['required', 'numeric'],
            'bmi_category'  => ['required','exists:bmis,id'],
            'waist'         => ['required','numeric'],
            'hip'           => ['required','numeric'],
            'wrist'         => ['required','numeric'],
            'height'        => ['required','numeric'],
        ];
    }
}
