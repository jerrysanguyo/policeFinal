<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'first_name'    =>  ['required', 'string', 'max:255'],
            'middle_name'   =>  ['required', 'string', 'max:255'],
            'last_name'     =>  ['required', 'string', 'max:255'],
            'mobile_number' =>  ['nullable', 'numeric'],
            'email'         =>  ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password'      =>  ['required', 'string', 'min:8', 'confirmed'],
            'role'          =>  ['string', 'in:user'],
        ];
    }
}
