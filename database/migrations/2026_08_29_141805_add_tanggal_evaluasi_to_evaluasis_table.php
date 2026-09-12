<?php

use Illuminate\Database\Migrations\Migration;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Legacy migration kept for databases that already recorded its name.
        // The evaluasis table is created with these columns by the preceding
        // create_evaluasis_table migration.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op: this migration no longer owns any columns.
    }
};
