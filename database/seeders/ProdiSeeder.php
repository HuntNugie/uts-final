<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            "nm_prodi" => "Teknik Informatika",
            "ketua_prodi" => "Feri alpiyasin S.kom",
            "kd_prodi" => "2401"
        ]);
        Prodi::create([
            "nm_prodi" => "Komputerisasi Akutansi",
            "ketua_prodi" => "Hasna Tisna S.kom",
            "kd_prodi" => "2403"
        ]);
        Prodi::create([
            "nm_prodi" => "Manajemen Informatika",
            "ketua_prodi" => "Jajang S.kom",
            "kd_prodi" => "2402"
        ]);
    }
}
