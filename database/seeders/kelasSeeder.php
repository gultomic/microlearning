<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\KelasMateri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kelas::truncate();
        KelasMateri::truncate();
        Schema::enableForeignKeyConstraints();

        $kelas = Kelas::create([
            'pembelajaran_id' => 1,
            'user_id' => 2,
        ]);

        KelasMateri::create([
            'kelas_id' => $kelas->id,
            'materi_id' => 1,
            'refs' => ['status' => 0]
        ]);

        KelasMateri::create([
            'kelas_id' => $kelas->id,
            'materi_id' => 2,
            'refs' => ['status' => 0]
        ]);
    }
}
