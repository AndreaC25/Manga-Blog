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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('tel')->unique();  // numero telefono unico per profilo 
            $table->string('address')->nullable();  // indirizzo del profilo
            $table->string('img')->nullable();  // percorso dell'immagine del profilo, può essere null se non viene fornita
            $table->text('description')->nullable();  // biografia del profilo, può essere null se non viene fornita
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // collega il profilo all'utente e cancella il profilo se l'utente viene cancellato
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
