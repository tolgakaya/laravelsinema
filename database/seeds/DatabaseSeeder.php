<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TestsTableSeeder::class);
        $this->command->info('Test tablosu dolduruldu');
        $this->call(FilimsTableSeeder::class);
        $this->command->info('Filims tablosu dolduruldu');
        $this->call(fiyat_grupsTableSeeder::class);
        $this->command->info('Fiyat_grups tablosu dolduruldu');
        $this->call(SlidesTableSeeder::class);
        $this->command->info('Slides tablosu dolduruldu');
        $this->call(GalerisTableSeeder::class);
        $this->command->info('Galeris tablosu dolduruldu');
        $this->command->info('Slides tablosu dolduruldu');
        $this->call(SalonsTableSeeder::class);
        $this->command->info('Salon tablosu dolduruldu');
        $this->call(SeansTableSeeder::class);
        $this->command->info('Seans tablosu dolduruldu');
        $this->call(Seans_FiyatsTableSeeder::class);
        $this->command->info('Fiyat tablosu dolduruldu');
        $this->call(BiletsTableSeeder::class);
        $this->command->info('Bilet tablosu dolduruldu');
        $this->call(SalanDuzensTableSeeder::class);
        $this->command->info('Salon planı tablosu dolduruldu');
    }
}
