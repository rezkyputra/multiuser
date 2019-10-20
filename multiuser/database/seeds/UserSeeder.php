<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
                'id'  			=> 1,
                'username'		=> 'admin1',
                'email' 			=> 'admin@gmail.com',
                'password'		=> bcrypt('123456'),                
                'role_id'			=> '0',
                'image'			=> 'r.png',
                'remember_token'	=> NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
