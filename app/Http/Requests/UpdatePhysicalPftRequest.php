<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhysicalPftRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'year'        => ['required','integer'],
            'date_pft'    => ['required','date'],
            'remarks'     => ['required','in:passed,failed'],
            'score'       => ['required','numeric','max:100'],
            'type'        => ['required','in:remedial,not'],
            'pft_picture' => ['nullable','image','mimes:jpeg,png,jpg','max:2048'],
        ];
    }
}
