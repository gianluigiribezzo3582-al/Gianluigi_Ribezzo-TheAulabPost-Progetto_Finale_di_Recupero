<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::where('email', 'admin@theaulabpost.it')->update(['role' => 'admin']);

        User::create([
            'first_name' => 'Giulia',
            'last_name'  => 'Marchetti',
            'username'   => 'gmarchetti',
            'email'      => 'revisor@theaulabpost.it',
            'password'   => Hash::make('12345678'),
            'role'       => 'revisor',
        ]);

        $writers = [
            ['first_name' => 'Marco',    'last_name' => 'Rossi',     'username' => 'mrossi',     'email' => 'marco.rossi@theaulabpost.it'],
            ['first_name' => 'Chiara',   'last_name' => 'Bianchi',   'username' => 'cbianchi',   'email' => 'chiara.bianchi@theaulabpost.it'],
            ['first_name' => 'Luca',     'last_name' => 'Ferrari',   'username' => 'lferrari',   'email' => 'luca.ferrari@theaulabpost.it'],
        ];

        foreach ($writers as $writer) {
            User::create(array_merge($writer, [
                'password' => Hash::make('12345678'),
                'role'     => 'writer',
            ]));
        }
    }
}
