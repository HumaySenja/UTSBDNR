<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Apel Fuji',
                'category' => 'Buah',
                'price' => 25000,
                'stock' => 50,
                'description' => 'Apel Fuji segar dari petani lokal.',
                'images' => 'apel.jpg',
            ],
            [
                'name' => 'Jeruk Bali',
                'category' => 'Buah',
                'price' => 30000,
                'stock' => 40,
                'description' => 'Jeruk Bali segar dengan rasa manis.',
                'images' => 'jerukbali.jpg',
            ],
            [
                'name' => 'Mangga Harum Manis',
                'category' => 'Buah',
                'price' => 35000,
                'stock' => 60,
                'description' => 'Mangga Harum Manis dari petani lokal.',
                'images' => 'Mangga.jpg',
            ],
            [
                'name' => 'Pisang Ambon',
                'category' => 'Buah',
                'price' => 12000,
                'stock' => 80,
                'description' => 'Pisang Ambon segar dan manis.',
                'images' => 'pisang.jpg',
            ],
            [
                'name' => 'Salak Bali',
                'category' => 'Buah',
                'price' => 15000,
                'stock' => 70,
                'description' => 'Salak Bali dengan tekstur renyah.',
                'images' => 'salak.jpg',
            ],
            [
                'name' => 'Tomat Merah',
                'category' => 'Sayuran',
                'price' => 15000,
                'stock' => 60,
                'description' => 'Tomat merah segar cocok untuk berbagai masakan.',
                'images' => 'tomat.jpg',
            ],
            [
                'name' => 'Brokoli Hijau',
                'category' => 'Sayuran',
                'price' => 18000,
                'stock' => 55,
                'description' => 'Brokoli hijau segar yang kaya akan nutrisi.',
                'images' => 'brokoli.jpg',
            ],
            [
                'name' => 'Wortel Organik',
                'category' => 'Sayuran',
                'price' => 12000,
                'stock' => 70,
                'description' => 'Wortel organik segar yang kaya beta-karoten.',
                'images' => 'wortel.jpg',
            ],
            [
                'name' => 'Paprika Merah',
                'category' => 'Sayuran',
                'price' => 22000,
                'stock' => 45,
                'description' => 'Paprika merah segar dengan rasa manis dan pedas.',
                'images' => 'paprika.jpg',
            ],
            [
                'name' => 'Bayam Hijau',
                'category' => 'Sayuran',
                'price' => 10000,
                'stock' => 80,
                'description' => 'Bayam hijau segar dengan kandungan zat besi tinggi.',
                'images' => 'bayam.jpg',
            ],
            [
                'name' => 'Kangkung Segar',
                'category' => 'Sayuran',
                'price' => 8000,
                'stock' => 90,
                'description' => 'Kangkung segar yang cocok untuk sayur bening.',
                'images' => 'kangkung.jpg',
            ],
            [
                'name' => 'Jeruk',
                'category' => 'buah',
                'price' => 15000,
                'stock' => 150,
                'description' => 'Jeruk segar dengan kandungan vitamin c yang baik untuk tubuh.',
                'images' => 'jeruk.jpg',
            ],
        ];
        
        // Menyimpan banyak produk sekaligus
        Product::insert($products);
    }
}
