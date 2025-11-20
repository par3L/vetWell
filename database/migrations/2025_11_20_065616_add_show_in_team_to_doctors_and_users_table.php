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
            $table->boolean('show_in_team')->default(false)->after('photo');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('show_in_team')->default(false)->after('phone');
            $table->string('position')->nullable()->after('show_in_team');
            $table->text('bio')->nullable()->after('position');
            $table->string('photo')->nullable()->after('bio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('show_in_team');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['show_in_team', 'position', 'bio', 'photo']);
        });
    }
};
