<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'administrator',
            'username' => 'administrator',
            'password' => 'user',
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'it support',
            'username' => 'itsupport',
            'password' => 'user',
            'role_id' => 2
        ]);

        App\User::create([
            'name' => 'direktur',
            'username' => 'direktur',
            'password' => 'user',
            'role_id' => 3
        ]);


    }
}
