<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    public function registerUser(array $data): User
    {
        return User::create([
            'first_name'    =>  $data['first_name'],
            'middle_name'   =>  $data['middle_name'],
            'last_name'     =>  $data['last_name'],
            'email'         =>  $data['email'],
            'mobile_number' =>  $data['mobile_number'],
            'password'      =>  Hash::make($data['password']),
            'role'          =>  'user',
        ]);
    }


    public function updateUser(User $user, array $data): User
    {
        // Check if the email is changing and ensure it's unique
        if ($user->email !== $data['email']) {
            $this->validateEmailUniqueness($data['email']);
        }

        $user->update([
            'first_name'    =>  $data['first_name'],
            'middle_name'   =>  $data['middle_name'],
            'last_name'     =>  $data['last_name'],
            'email'         =>  $data['email'],
            'mobile_number' =>  $data['mobile_number'],
            // Only update password if it's provided
            'password'      =>  isset($data['password']) ? Hash::make($data['password']) : $user->password,
            'role'          =>  $data['role'],
        ]);

        return $user;
    }

    protected function validateEmailUniqueness(string $email): void
    {
        $exists = User::where('email', $email)->exists();
        if ($exists) {
            throw ValidationException::withMessages([
                'email' => 'The email address is already registered.',
            ]);
        }
    }
}