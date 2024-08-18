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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('api_id')->unique();
            $table->string('title');
            $table->text('description');
            $table->date('release_date');
            $table->string('director');
            $table->string('poster_path')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->integer('runtime')->nullable();
            $table->string('tagline')->nullable();
            $table->json('cast')->nullable(); 
            $table->string('genre')->default('Unknown')->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
