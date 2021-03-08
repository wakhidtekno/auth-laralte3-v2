<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'superadmin',
            'password' => '123456',
            'nama' => 'super admin',
            'level' => 'superadmin',
        ]);

        User::create([
            'username' => 'admin',
            'password' => '123456',
            'nama' => 'admin',
            'level' => 'admin',
        ]);

        User::create([
            'username' => 'user',
            'password' => '123456',
            'nama' => 'user',
            'level' => 'user',
        ]);
    }
}
