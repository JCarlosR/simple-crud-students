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
        //Admin
        User::create([
            'name' => 'administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'control_number' => '2041',
            'matter' => 'programación',
            'classroom' => 'A5',
            'start_time' => null,
            'end_time' => null,
            'image' => null
        ]);
    }
}
