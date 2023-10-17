<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        // Buat 25 artikel dummy
        for ($i = 0; $i < 25; $i++) {
            // Generate kalimat dengan panjang 6 kata
            $isbn = $faker->sentence(13);
            // Generate paragraf dengan panjang 20 kalimat
            $judul = $faker->paragraph(20);
            $pilihan = ['uncategorized', 'sci-fi', 'sci-fi', 'history', 'biography', 'romance', 'education', 'culinary', 'comic'];
            $kategori = $faker->randomElement($pilihan);
            // Generate angka acak antara 0 hingga 100
            $halaman = $faker->numberBetween(0, 100);
            $penerbit = $faker->paragraph(20);
            // Generate DateTime antara 3 bulan lall
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('articles')->insert([
                'isbn' => $isbn,
                'judul' => $judul,
                'halaman' => $halaman,
                'kategori' => $kategori,
                'penerbit' => $penerbit,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}