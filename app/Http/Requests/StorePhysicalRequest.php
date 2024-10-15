<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhysicalRequest extends FormRequest
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
            'picture_left'  => ['required','image','mimes:jpeg,png,jpg','max:2048'],
            'picture_right' => ['required','image','mimes:jpeg,png,jpg','max:2048'],
            'picture_front' => ['required','image','mimes:jpeg,png,jpg','max:2048'],
            'year.*'        => ['required','integer'],
            'date_pft.*'    => ['required','date'],
            'remarks.*'     => ['required','in:passed,failed'],
            'score.*'       => ['required','numeric'],
            'type.*'        => ['required','in:remedial,not'],
            'pft_picture.*' => ['required','image','mimes:jpeg,png,jpg','max:2048'],
        ];
    }
}

