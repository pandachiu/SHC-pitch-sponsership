<?php

use Illuminate\Database\Seeder;
use App\Property;

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

        Property::where('id', 1)->orWhere('id', 91)->orWhere('id', 4915)->orWhere('id', 5005)->update(['price' => '100.00']);
    }
}
