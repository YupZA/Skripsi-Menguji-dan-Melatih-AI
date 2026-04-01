<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materi::create([
            'judul' => 'Bab 1 - Apa itu kecerdasan buatan',
            'slug' => 'bab-1-materi-a',
        ]);

        Materi::create([
            'judul' => 'Bab 1 - Apa itu machine learning',
            'slug' => 'bab-1-materi-b',
        ]);

        Materi::create([
            'judul' => 'Bab 1 - Langkah-langkah proses machine learning',
            'slug' => 'bab-1-materi-c',
        ]);

        Materi::create([
            'judul' => 'Bab 2 - Apa itu google teachable machine',
            'slug' => 'bab-2-materi-a',
        ]);

        Materi::create([
            'judul' => 'Bab 2 - Google teachable machine : membuat AI jadi mudah',
            'slug' => 'bab-2-materi-b',
        ]);

        Materi::create([
            'judul' => 'Bab 2 - Jenis proyek di google teachable machine',
            'slug' => 'bab-2-materi-c',
        ]);

        Materi::create([
            'judul' => 'Bab 3 - Membuat model gambar',
            'slug' => 'bab-3-materi-a',
        ]);

        Materi::create([
            'judul' => 'Bab 3 - Membuat model deteksi suara',
            'slug' => 'bab-3-materi-b',
        ]);

        Materi::create([
            'judul' => 'Bab 3 - Membuat model deteksi pose tubuh',
            'slug' => 'bab-3-materi-c',
        ]);

        Materi::create([
            'judul' => 'Bab 3 - Perbandingan model suara, gambar, dan pose tubuh',
            'slug' => 'bab-3-materi-d',
        ]);
    }
}
