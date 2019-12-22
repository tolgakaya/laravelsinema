<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->delete();
        \App\Models\Slide::create(array('adi'=>'first-slide.jpg', 'video'=>'','baslik'=>'bur bir baslik',
            'altbaslik'=>'bu da alt baslik','buton'=>'butonumuz','yazi'=>'bu da süper bir yazi bea'));
    }
}
