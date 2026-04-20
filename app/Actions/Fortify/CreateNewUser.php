<?php

namespace App\Actions\Fortify;

use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required', Rule::in(['reader', 'writer'])],
        ])->validate();

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if ($input['role'] == 'writer') {
            Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(['user' => $user, 'role' => 'writer']));
        }

        session()->flash('status', 'user-registered');

        return $user;
    }
}
