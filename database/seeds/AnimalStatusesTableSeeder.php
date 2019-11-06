<?php

use Illuminate\Database\Seeder;

class AnimalStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_statuses')->insert([
            'name' => 'Lost',
        ]);
        DB::table('animal_statuses')->insert([
            'name' => 'Found',
        ]);
    }
}
