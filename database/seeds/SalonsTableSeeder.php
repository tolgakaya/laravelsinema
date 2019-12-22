<?php

use Illuminate\Database\Seeder;

class SalonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salons')->delete();
        \App\Models\Salon::create(array('salon_adi'=>'Koca Salon', 'aciklama'=>'Büyük perde'
            ));


    }
}
