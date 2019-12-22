<?php

use Illuminate\Database\Seeder;

class GalerisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galeris')->delete();
        \App\Models\Galeri::create(array('movie_id'=>1, 'tur'=>'resim','sayfa'=>'single',
            'kod'=>'tek','adi'=>'deneme','uzanti'=>'jpg','url'=>''));
    }
}
