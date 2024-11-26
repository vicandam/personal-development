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
        Schema::table('ai_instructions', function (Blueprint $table) {
            $table->string('coach_name')->after('user_id');
            $table->string('topic')->after('coach_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ai_instructions', function (Blueprint $table) {
            $table->dropColumn(['coach_name','topic']);
        });
    }
};
