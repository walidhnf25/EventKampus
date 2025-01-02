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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();  // ID untuk review
            $table->bigInteger('event_id')->unsigned();  // Pastikan tipe data sama dengan idEvent di tabel events
            $table->foreign('event_id')->references('idEvent')->on('events')->onDelete('cascade');
            $table->text('review');  // Kolom untuk review
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
