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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clg_id')->references('id')->on('collages');
            $table->foreignId('dep_id')->references('id')->on('departments');
            $table->string('year');
            $table->string('title');
            $table->text('dec');
            $table->string('type');
            $table->text('link');
            $table->string('ucode');
            $table->foreignId('added_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
