<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public function registerUser(array $data): User
    {
        return User::create([
            'first_name'    => $data['first_name'],
            'middle_name'   =>  $data['middle_name'],
            'last_name'     =>  $data['last_name'],
            'email'         => $data['email'],
            'mobile_number' =>  $data['mobile_number'],
            'password'      => Hash::make($data['password']),
            'role'          =>  'user',
        ]);
    }
}