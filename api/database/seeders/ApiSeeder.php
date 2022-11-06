<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
# use Illuminate\Support\Facades\DB;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        	[
	        	'name' => 'Sara',
	        	'email' => 'sara@mail.com',
	        	'password' => \Hash::make(123456),
        	],
        ]);

        \DB::table('empleados')->insert([
        	[
	        	'nombres' => 'Juan Pablo',
	        	'apellidos' => 'Alvira',
	        	'genero' => 'M',
	        	'dni' => 1234567890
        	],
        	[
	        	'nombres' => 'Maria Andrea',
	        	'apellidos' => 'Acosta',
	        	'genero' => 'F',
	        	'dni' => 9876543210
        	],
        ]);
    }
}
