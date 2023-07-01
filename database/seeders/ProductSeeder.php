<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
          [
            'p_name' => 'Nike',
            'price' => '1499',
            'category' =>  'shoes',
            'desc' => 'Nike Mens Revolution 6 Nn |Sports Shoes-Men Sneaker',
            'gallery' => ''
          ],
          [
            'p_name' => 'Samsung',
            'price' => '7777',
            'category' =>  'mobile',
            'desc' => 'Samsung Galaxy M13 (Midnight Blue, 6GB, 128GB Storage)',
            'gallery' => ''
          ],
          [
            'p_name' => 'Samsung',
            'price' => '13999',
            'category' =>  'tv',
            'desc' => 'Samsung 80 cm (32 Inches) Wondertainment Series HD Ready LED Smart TV',
            'gallery' => ''
          ],
          [
            'p_name' => 'LG',
            'price' => '19999',
            'category' =>  'tv',
            'desc' => 'LG 80 cm (32 inches) HD Ready Smart LED TV',
            'gallery' => ''
          ],
          [
            'p_name' => 'beatXP ',
            'price' => '999',
            'category' =>  'watch',
            'desc' => 'beatXP Unbound+ 1.8" (4.5 cm) AMOLED Display (1000 Nits Brightness)',
            'gallery' => ''
          ],
          [
            'p_name' => 'boat ',
            'price' => '2599',
            'category' =>  'watch',
            'desc' => 'boAt Xtend Smartwatch with Alexa Built-in, 1.69” HD Display, Multiple Watch Faces, Stress Monitor, Heart & SpO2 Monitoring',
            'gallery' => ''
          ],
        ]);
    }
}
