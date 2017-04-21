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

                //$section = App\PitchSection::where('column_start', '>=', $column)->firstOrFail();
                $section = App\PitchSection::where('column_start', '<=', $column)
                    ->where('column_end', '>=', $column)
                    ->where('row_start', '<=', $row)
                    ->where('row_end', '>=', $row)->first();

                DB::table('properties')->insert([
                    'column' => $column,
                    'row' => $row,
                    'section_id' => $section->id,
                    'price' => '10.00',
                ]);
            }
        }
    }
}
