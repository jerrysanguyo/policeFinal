<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'program_id'  =>  ['required', 'integer', 'exists:programs,id'],
        ];
    }
}
