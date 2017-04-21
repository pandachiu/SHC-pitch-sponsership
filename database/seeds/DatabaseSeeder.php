<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PitchSectionTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
    }
}
