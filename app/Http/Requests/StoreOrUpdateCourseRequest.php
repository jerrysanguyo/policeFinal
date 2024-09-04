<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'program_id.*'          =>  ['numeric', 'exists:programs,id'],
            'class_number.*'        =>  ['string', 'required', 'max:255'],
            'duration.*'            =>  ['numeric', 'required'],
            'ranking.*'             =>  ['numeric', 'required'],
        ];
    
        if (!$this->userCourseExn) {
            $rules = array_merge($rules, [
                'high_training'     =>  ['numeric', 'exists:programs,id'],
                'date_graduation'   =>  ['date'],
                'order_merit'       =>  ['numeric'],
                'ftoc'              =>  ['string', 'in:yes,no'],
                'qe_result'         =>  ['string', 'in:passed,failed'],
                'date_qualifying'   =>  ['date'],
            ]);
        }
    
        return $rules;
    }
}
