<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add all properties into the Database.
        foreach (range(1, 55) as $row) {
            foreach (range(1, 91) as $column) {
                DB::table('properties')->insert([
                    'column' => $column,
                    'row' => $row,
                    'price' => '10.00',
                ]);
            }
        }
    }
}
