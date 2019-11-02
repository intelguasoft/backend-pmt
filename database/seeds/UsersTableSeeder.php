<?php

use Edgar\PMT\Models\Role;
use Illuminate\Database\Seeder;
use IntelGUA\PMT\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => '',
            'description' => ''
        ]);
        User::truncate();
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'name' => 'Administrator',
            'role_id' => $role->id,
        ]);
    }
}
