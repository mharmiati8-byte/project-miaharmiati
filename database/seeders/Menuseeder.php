<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'nama_menu' => 'Pempek Palembang',
                'kategori' => 'Makanan',
                'deskripsi' => 'Enak dan gurih, pempek kami dibuat dengan resep rahasia yang menghasilkan tekstur renyah di luar dan lembut di dalam. Cocok untuk camilan atau hidangan utama yang memuaskan selera Anda.',
                'image' => 'makanan.jpeg',
                'harga' => 25000,
            ],
            [
                'nama_menu' => 'Frozen Food',
                'kategori' => 'Snack',
                'deskripsi' => 'Produk makanan beku berkualitas tinggi untuk disajikan kapan saja tanpa ribet.',
                'image' => 'frozen_food.jpeg',
                'harga' => 20000,
            ],
            [
                'nama_menu' => 'Minuman Segar',
                'kategori' => 'Minuman',
                'deskripsi' => 'Minuman segar dengan rasa yang lezat dan menyegarkan.',
                'image' => 'minuman.jpeg',
                'harga' => 15000,
            ],

        ];

        foreach ($menus as $menu) {
            Menu::updateOrCreate(
                ['nama_menu' => $menu['nama_menu']],
                array_merge($menu, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}