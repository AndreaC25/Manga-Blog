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
        Schema::create('category_comic', function (Blueprint $table) {
            $table->foreignId('comic_id')->constrained()->onDelete('cascade'); // collega la categoria al manga e cancella la categoria se il manga viene cancellato
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // collega il manga alla categoria e cancella il manga se la categoria viene cancellata   
                $table->primary(['comic_id', 'category_id']); // chiave primaria composta da comic_id e category_id
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_comic');
    }
};
