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
        Schema::table('pets', function (Blueprint $table) {
            // Drop existing foreign key
            $table->dropForeign(['client_id']);
            
            // Rename column to user_id
            $table->renameColumn('client_id', 'user_id');
            
            // Add new foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->renameColumn('user_id', 'client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }
};
