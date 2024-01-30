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
        // Controleer eerst of de kolom 'tags' nog niet bestaat
        if (!Schema::hasColumn('blogs', 'tags')) {
            Schema::table('blogs', function (Blueprint $table) {
                // Voeg de 'tags' kolom toe als deze nog niet bestaat
                $table->string('tags')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Verwijder de 'tags' kolom als deze bestaat
        if (Schema::hasColumn('blogs', 'tags')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn('tags');
            });
        }
    }
};


