<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Master',
            'email'     => 'master@gmail.com',
            'password'  => Hash::make('123456'),
        ])->syncRoles('master');

        User::create([
            'name'      => 'Super Admin',
            'email'     => 'super_admin@gmail.com',
            'password'  => Hash::make('123456'),
        ])->syncRoles('super_admin');
    }
}
