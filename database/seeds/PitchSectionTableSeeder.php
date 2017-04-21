<?php

use Illuminate\Database\Seeder;

class PitchSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columnCount = 0;
        $rowCount = 0;

        // Add all pitch sections into the Database.
        foreach (range(1, 32) as $section) {

            $columnStart = ($columnCount * 12) + 1;
            $columnEnd = ( ($columnCount + 1) * 12);
            $columnEnd = min($columnEnd, 91);

            $rowStart = ($rowCount * 14) + 1;
            $rowEnd = ( ($rowCount + 1) * 14);
            $rowEnd = min($rowEnd, 55);

            DB::table('pitch_sections')->insert([
                'column_start' => $columnStart,
                'column_end' => $columnEnd,
                'row_start' => $rowStart,
                'row_end' => $rowEnd
            ]);

            $columnCount++;

            if($columnCount > 7) {
                $columnCount = 0;
                $rowCount++;
            }
        }
    }
}
