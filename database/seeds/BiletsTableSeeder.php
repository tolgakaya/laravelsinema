<?php

use Illuminate\Database\Seeder;

class BiletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bilets')->delete();
       // \App\Models\Bilet::create(array('bilet_no'=>'A123B245',seans_id' => 1, 'koltuk' => 'A1,A2,A3',
        //    'seans_tarihi' => '2016-10-28', 'iptal' => 0));
    }
}
