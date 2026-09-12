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
        Schema::table('evaluasis', function (Blueprint $table) {

            $table->foreignId('karyawan_id')
                ->constrained('karyawans')
                ->cascadeOnDelete();

            $table->foreignId('goal_id')
                ->constrained('goals')
                ->cascadeOnDelete();

            $table->enum('jenis_evaluasi', [
                'self',
                'peer',
                'supervisor'
            ]);

            $table->unsignedTinyInteger('skor')
                ->nullable();

            $table->text('komentar')
                ->nullable();

            $table->date('tanggal_evaluasi');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluasis', function (Blueprint $table) {

            $table->dropForeign(['karyawan_id']);
            $table->dropForeign(['goal_id']);

            $table->dropColumn([
                'karyawan_id',
                'goal_id',
                'jenis_evaluasi',
                'skor',
                'komentar',
                'tanggal_evaluasi'
            ]);

        });
    }
};