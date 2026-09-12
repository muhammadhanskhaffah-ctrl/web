<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('monitorings', function (Blueprint $table) {

            $table->id();

            // Relasi ke karyawan
            $table->foreignId('karyawan_id')
                ->constrained('karyawans')
                ->cascadeOnDelete();

            // Relasi ke goal
            $table->foreignId('goal_id')
                ->constrained('goals')
                ->cascadeOnDelete();

            // Target yang harus dicapai
            $table->decimal('target', 10, 2);

            // Hasil/realisasi yang sudah dicapai
            $table->decimal('realisasi', 10, 2)->default(0);

            // Persentase pencapaian
            $table->decimal('persentase', 5, 2)->default(0);

            // Tanggal monitoring
            $table->date('tanggal_monitoring');

            // Catatan tambahan
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Membatalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};