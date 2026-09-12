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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();

            $table->string('nama_goal');
            $table->text('deskripsi')->nullable();

            $table->string('tipe')->default('Individu');

            $table->decimal('target', 10, 2)->default(0);

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->string('status')->default('Aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};