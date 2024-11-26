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
        Schema::create('fine_tunings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('file_id');
            $table->string('object');
            $table->string('bytes');
            $table->string('filename');
            $table->string('purpose');
            $table->string('status');
            $table->string('status_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fine_tunings');
    }
};
