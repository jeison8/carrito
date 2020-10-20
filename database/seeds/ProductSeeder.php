<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'img' => 'img/product01.png',
            'name' => 'MacBook-pro',
            'price' => 4530000,
            'detail' => 'Procesador Intel Core i9, 6 núcleos de 2,9 GHz Turbo Boost 4,8 GHz, 32 GB de memoria DDR4, 4 GB de memoria de vídeo, 4 TB de almacenamiento SSD',
            'categories_id' => 1
        ]);

        DB::table('products')->insert([
            'img' => 'img/product03.png',
            'name' => 'MacBook',
            'price' => 2000000,
            'detail' => 'Procesador Intel Core i3, 3 núcleos de 2,9 GHz Turbo Boost 2,8 GHz, 8 GB de memoria DDR4, 2 GB de memoria de vídeo, 1 TB de almacenamiento SSD',
            'categories_id' => 1
        ]);

        DB::table('products')->insert([
            'img' => 'img/product02.png',
            'name' => 'Audifonos-stellar',
            'price' => 180000,
            'detail' => 'Sonido envolvente BassPro de 4,6 GHz',
            'categories_id' => 2
        ]);
    }
}
