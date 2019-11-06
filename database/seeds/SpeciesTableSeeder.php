<?php

use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('species')->insert([
            'name' => 'Cat',
        ]);
        DB::table('species')->insert([
            'name' => 'Dog',
        ]);
        DB::table('species')->insert([
            'name' => 'Hamster',
        ]);
        DB::table('species')->insert([
            'name' => 'Parrot',
        ]);
    }
}
