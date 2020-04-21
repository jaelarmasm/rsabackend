<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Jael',
            'lastname' => 'Armas',
            'username' => 'jfarmas',
            'email' => 'jfarmas@email.com',
            'password' => Hash::make('jfarmas'),
        ]);
        factory(User::class)->create([
            'name' => 'Gonzalo',
            'lastname' => 'Tapuy',
            'username' => 'grtapuy',
            'email' => 'grtapuy@email.com',
            'password' => Hash::make('grtapuy'),
        ]);
    }
}
