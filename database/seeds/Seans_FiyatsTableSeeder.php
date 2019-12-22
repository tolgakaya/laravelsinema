<?php

use Illuminate\Database\Seeder;

class Seans_FiyatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seans_fiyats')->delete();

        \App\Models\Seans_Fiyat::create(array('seans_id'=>1,'grup_id'=>1, 'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>20.00,'iskonto_orani'=>10.00,
            'sabit_fiyat'=>0.00,'bilet_adedi'=>0,'gecerlilik_tarihi'=>'2016-12-29','iptal'=>false));
        \App\Models\Seans_Fiyat::create(array('seans_id'=>2,'grup_id'=>1, 'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>20.00,'iskonto_orani'=>10.00,
            'sabit_fiyat'=>0.00,'bilet_adedi'=>0,'gecerlilik_tarihi'=>'2016-12-29','iptal'=>false));
        \App\Models\Seans_Fiyat::create(array('seans_id'=>3,'grup_id'=>1, 'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>20.00,'iskonto_orani'=>10.00,
            'sabit_fiyat'=>0.00,'bilet_adedi'=>0,'gecerlilik_tarihi'=>'2016-12-29','iptal'=>false));

        \App\Models\Seans_Fiyat::create(array('seans_id'=>1,'grup_id'=>2, 'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>20.00,'iskonto_orani'=>0.00,
            'sabit_fiyat'=>15.00,'bilet_adedi'=>0,'gecerlilik_tarihi'=>'2016-12-29','iptal'=>false));
        \App\Models\Seans_Fiyat::create(array('seans_id'=>2,'grup_id'=>2, 'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>20.00,'iskonto_orani'=>0.00,
            'sabit_fiyat'=>15.00,'bilet_adedi'=>0,'gecerlilik_tarihi'=>'2016-12-29','iptal'=>false));
        \App\Models\Seans_Fiyat::create(array('seans_id'=>3,'grup_id'=>2, 'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>20.00,'iskonto_orani'=>0.00,
            'sabit_fiyat'=>15.00,'bilet_adedi'=>0,'gecerlilik_tarihi'=>'2016-12-29','iptal'=>false));
    }
}
