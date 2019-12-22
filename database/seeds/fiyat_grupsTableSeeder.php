<?php

use Illuminate\Database\Seeder;

class fiyat_grupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fiyat_grups')->delete();
        \App\Models\fiyat_grup::create(array('grup_adi'=>'Öğrenci', 'aciklama'=>'Öğrenci İndirimi'));
        \App\Models\fiyat_grup::create(array('grup_adi'=>'Emekli', 'aciklama'=>'Emekli İndirimi'));
    }
}
