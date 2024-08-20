<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        $userId = $this->route('account')->id;

        return [
            'first_name'    =>  ['required', 'string', 'max:255'],
            'middle_name'   =>  ['required', 'string', 'max:255'],
            'last_name'     =>  ['required', 'string', 'max:255'],
            'mobile_number' =>  ['nullable', 'numeric'],
            'email'         =>  [
                                    'required',
                                    'string',
                                    'email',
                                    'max:255',
                                    Rule::unique('users', 'email')->ignore($userId),
                                ],
            'password'      =>  ['nullable', 'string', 'min:8'],
            'role'          =>  ['required', 'string', 'in:user,admin,superadmin'],
        ];
    }
}
