<?php

use Illuminate\Database\Seeder;

class profileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profile::insert([
            [
                'id'  			    => 1,
                'id_user'		    => 1,
                'fullname' 			=> 'Admin',
                'gender'		    => 'L',                
                'no_telp'			=> '081999999999',
                'expected_sallary'  => '3000000',
                'address'           => 'Jakarta',                
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ],
            [
                'id'  			    => 2,
                'id_user'		    => 2,
                'fullname' 			=> 'Rezky Putra Akkif S.Kom',
                'gender'		    => 'L',                
                'no_telp'			=> '082192061400',
                'expected_sallary'  => '3900000',
                'address'           => 'Jl. Saidan Depok',                
                'created_at'        => \Carbon\Carbon::now(),
                'updated_at'        => \Carbon\Carbon::now()
            ]
        ]);
    }
}
