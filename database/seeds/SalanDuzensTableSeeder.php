<?php

use Illuminate\Database\Seeder;

class SalanDuzensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('SalonDuzens')->delete();
        \App\Models\SalonDuzen::create(array('salon_id'=>'1', 'sits_line'=>'A,B,C',
            'sits_row'=>'A1,A2,A3,X,A4,A5,A6-B1,B2,B3,B4,B5,B6,X,B7,B8,B9,B10,B11,B12-C1,C2,C3,X,C4,C5,C6','sits_number'=>'1,2,3,4,5,6,7,8,9,10,11,12'));
    }
}
