<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'rank_id'           => ['required', 'integer', 'exists:ranks,id'],
            'qlfr'              => ['required', 'string', 'max:255'],  
            'badge_number'      => ['required', 'string', 'max:255'],  
            'gender'            => ['required', 'string', 'in:male,female'],
            'birthdate'         => ['required', 'date'],  
            'age'               => ['required', 'integer'],  
            'office_id'         => ['required', 'integer', 'exists:offices,id'], 
            'shift'             => ['required', 'date'],
            'entered_service'   => ['required', 'date'],   
            'last_promotion'    => ['required', 'date'],
        ];
    }
}
