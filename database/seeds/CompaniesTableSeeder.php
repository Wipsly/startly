<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Companies
        DB::table('companies')->delete();

        // Insert fake users
        DB::table('companies')->insert(array(
            array(
        	   	'name'			=> 'Computech GmbH',
             	),
             array(
             	'name'			=> 'IHK-Duisburg',
             	),
             )
        );
    }
}
