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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->after('name');
            $table->string('position')->after('spesialisasi'); // Kepala Dokter Hewan, Dokter Hewan Senior, dll
            $table->integer('experience_years')->default(0)->after('position'); // Tahun pengalaman
            $table->text('bio')->nullable()->after('experience_years'); // Deskripsi singkat
            $table->string('photo')->nullable()->after('bio'); // Path foto profil
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn(['phone', 'position', 'experience_years', 'bio', 'photo']);
        });
    }
};
