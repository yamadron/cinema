<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'name' => str_random(10),
            'description' => str_random(200),
            'image' => str_random(20) . '.jpg',
            'status' => array_rand(['coming', 'now', 'gone'])
        ]);
    }
}
