<?php

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
        User::truncate();
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'name' => 'Administrator',
        ]);
    }
}
