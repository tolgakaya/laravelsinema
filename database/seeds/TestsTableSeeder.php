<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tests')->delete();
        \App\Models\test::create(array('adi'=>'Tolga Kaya', 'aciklama'=>'Beceriksiz adam'),
            array('adi'=>'Mersin İlçesi', 'aciklama'=>'BOZYAZI'));
    }
}
