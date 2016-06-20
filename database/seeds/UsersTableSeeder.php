<?php

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
       	// Delete existing Users
        DB::table('users')->delete();

        // Insert fake users
        DB::table('users')->insert(array(
            array(
        	   	'name'			=> 'Dominik Geimer',
             	'email' 		=> 'dominik.geimer@computech-oberhausen.de',
             	'password'		=> bcrypt('password'),
             	'company_id'	=> 1
             	),
			array(
             	'name'			=> 'Marcel Klaes',
             	'email' 		=> 'marcel.klaes@computech-oberhausen.de',
             	'password'		=> bcrypt('password'),
             	'company_id'	=> 1
             	),
			array(
				'name'			=> 'Udo Linden',
				'email' 		=> 'udo.linden@computech-oberhausen.de',
				'password'		=> bcrypt('password'),
				'company_id'	=> 1
				),
			array(
				'name'			=> 'Barbara Linden',
				'email' 		=> 'barbara.linden@computech-oberhausen.de',
				'password'		=> bcrypt('password'),
				'company_id'	=> 1
				),
            array(
             	'name'			=> 'Alisa Hellmann',
             	'email' 		=> 'alisa.hellmann@ihk.de',
             	'password'		=> bcrypt('password'),
             	'company_id'	=> 2
             	),
            array(
             	'name'			=> 'Michael Ruescher',
             	'email' 		=> 'michael.ruescher@ihk.de',
             	'password'		=> bcrypt('password'),
             	'company_id'	=> 2
             	),
            )
        );
    }
}
