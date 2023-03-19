<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      => 'master',
            'caption'   => 'Master',
        ]);

        Role::create([
            'name'      => 'super_admin',
            'caption'   => 'Super Admin',
        ]);
    }
}
