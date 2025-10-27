<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ini memanggil file Seeder yang ada di atas
        // PERBAIKI TANDA TITIK (.) MENJADI PANAH (->)
        $this->call([
            CreateSuperAdminSeeder::class,
        ]);
    }
}