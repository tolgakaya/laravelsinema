<?php

use Illuminate\Database\Seeder;

class FilimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filims')->delete();
        \App\Models\Filim::create(array('adi'=>'Tolga Kaya', 'yonetmen'=>'Beceriksiz adam',
                'oyuncular'=>'kendi çalar kendi oynar','konu'=>'Konusuz yaşam','ulke'=>'Türkiye',
            'yil'=>'2013','yas_siniri'=>'70','kategori'=>'gerilim','suresi'=>'37 Yıl','gosterimde'=>1,'gelecek'=>0));

        \App\Models\Filim::create(array('adi'=>'Natali Kaya', 'yonetmen'=>'Beceriksiz kadın',
            'oyuncular'=>'kendi çalar kendi oynar','konu'=>'Konusuz yaşam','ulke'=>'Ukrayna',
            'yil'=>'2013','yas_siniri'=>'70','kategori'=>'gerilim','suresi'=>'37 Yıl','gosterimde'=>1,'gelecek'=>0));
    }
}
