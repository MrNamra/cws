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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clg_id')->references('id')->on('collages');
            $table->foreignId('dep_id')->references('id')->on('departments');
            $table->foreignId('ass_id')->references('id')->on('assignments');
            $table->string('sender_name');
            $table->string('sender_email')->nullable();
            $table->string('title');
            $table->text('dec');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
