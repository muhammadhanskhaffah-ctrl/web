<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Seed data goals untuk setiap karyawan.
     */
    public function run(): void
    {
        $karyawans = Karyawan::all();

        foreach ($karyawans as $karyawan) {

            Goal::updateOrCreate(
                [
                    'karyawan_id' => $karyawan->id,
                    'nama_goal' => 'Evaluasi Kinerja Semester 1',
                ],
                [
                    'deskripsi' => 'Evaluasi kinerja karyawan Semester 1',
                    'tipe' => 'Individu',
                    'target' => 100,
                    'tanggal_mulai' => '2026-01-01',
                    'tanggal_selesai' => '2026-06-30',
                    'status' => 'Aktif',
                ]
            );
        }
    }
}