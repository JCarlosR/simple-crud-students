<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'control_number' => '123456789',
            'matter' => '',
            'classroom' => '',
            'start_time' => null,
            'end_time' => null,
            'image' => null
        ]);
    }
}
