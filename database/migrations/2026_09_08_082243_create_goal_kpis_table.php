<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel KPI yang dimiliki oleh setiap Goal.
     */
    public function up(): void
    {
        Schema::create('goal_kpis', function (Blueprint $table) {

            $table->id();

            // Goal yang memiliki KPI ini
            $table->foreignId('goal_id')
                ->constrained('goals')
                ->cascadeOnDelete();

            // Nomor urut KPI
            $table->unsignedInteger('no');

            // Indikator Kinerja Perusahaan
            $table->text('indikator_kinerja_perusahaan')->nullable();

            // Indikator Kinerja Individu
            $table->text('indikator_kinerja_individu');

            // Baseline tahun 2025
            $table->text('baseline_2025')->nullable();

            // Target tahun 2026
            $table->text('target_2026')->nullable();

            // Bobot target KPI
            $table->decimal('bobot_target', 10, 2)->nullable();

            $table->timestamps();

            // Satu Goal tidak boleh memiliki nomor KPI yang sama
            $table->unique(['goal_id', 'no']);
        });
    }

    /**
     * Menghapus tabel KPI.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_kpis');
    }
};