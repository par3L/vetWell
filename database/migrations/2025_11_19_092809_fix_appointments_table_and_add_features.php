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
        Schema::table('appointments', function (Blueprint $table) {
            // Drop old foreign key constraint
            $table->dropForeign(['client_id']);
            $table->dropForeign(['service_id']);
            
            // Drop old columns
            $table->dropColumn(['client_id', 'service_id']);
            
            // Add new columns
            $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            $table->text('doctor_notes')->nullable()->after('client_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Restore old structure
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'doctor_notes']);
            
            $table->foreignId('client_id')->after('id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->after('doctor_id')->constrained()->onDelete('cascade');
        });
    }
};
