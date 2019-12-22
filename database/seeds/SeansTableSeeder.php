<?php

use Illuminate\Database\Seeder;

class SeansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seans')->delete();

        \App\Models\Sean::create(array('salon_id'=>1,'movie_id'=>1, 'bitis_tarihi'=>'2016-12-29','saat'=>'22:30',
            'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>25,'fix_fiyat'=>1));
        \App\Models\Sean::create(array('salon_id'=>1,'movie_id'=>1, 'bitis_tarihi'=>'2016-12-29','saat'=>'20:30',
            'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>25,'fix_fiyat'=>0));
        \App\Models\Sean::create(array('salon_id'=>1,'movie_id'=>1, 'bitis_tarihi'=>'2016-12-29','saat'=>'23:30',
            'standart_fiyat'=>20.00,'hafta_sonu_fiyati'=>25,'fix_fiyat'=>0));
    }
}
