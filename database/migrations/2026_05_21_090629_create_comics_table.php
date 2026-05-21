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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // titolo del manga
            $table->integer('number'); // numero del manga
            $table->year('year'); // anno di pubblicazione del manga
            $table->text('plot'); // trama del manga
            $table->string('img')->nullable(); // copertina del manga
            $table->foreignId('magazine_id')->nullable()->constrained()->onDelete('set null'); // rivista
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // utente autore del manga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
