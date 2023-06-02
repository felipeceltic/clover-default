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
        Schema::table('expense', function (Blueprint $table) {
            $table->integer('repeat')->after('value');
            $table->uuid('repeatoken')->after('repeat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expense', function (Blueprint $table) {
            $table->dropColumn('repeat');
        });
        Schema::table('expense', function (Blueprint $table) {
            $table->dropColumn('repeatoken');
        });
    }
};
