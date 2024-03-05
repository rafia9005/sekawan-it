<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123')
        ]);
        Kategori::create([
            'kategori_nama' => 'Categori 1'
        ]);
        Kategori::create([
            'kategori_nama' => 'Categori 2'
        ]);
        Kategori::create([
            'kategori_nama' => 'Categori 3'
        ]);
    }
}
