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
        Schema::table('monitoring_kpis', function (Blueprint $table) {
            $table->decimal('bobot_target', 15, 6)
                ->nullable()
                ->after('persentase');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('monitoring_kpis', function (Blueprint $table) {
            $table->dropColumn('bobot_target');
        });
    }
};