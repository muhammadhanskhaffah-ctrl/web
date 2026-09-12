<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monitoring_kpis', function (Blueprint $table) {
            $table->id();

            // Monitoring utama
            $table->foreignId('monitoring_id')
                ->constrained('monitorings')
                ->cascadeOnDelete();

            // KPI yang dipilih dari Goal
            $table->foreignId('goal_kpi_id')
                ->constrained('goal_kpis')
                ->cascadeOnDelete();

            // Pencapaian yang diinput oleh Supervisor / HR
            $table->decimal('pencapaian', 15, 2)->nullable();

            // Persentase pencapaian
            $table->decimal('persentase', 15, 2)->nullable();

            // Bobot yang berhasil dicapai
            $table->decimal('bobot_tercapai', 15, 2)->nullable();

            $table->timestamps();

            // Satu KPI tidak boleh dimasukkan dua kali
            // dalam satu monitoring
            $table->unique(['monitoring_id', 'goal_kpi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_kpis');
    }
};