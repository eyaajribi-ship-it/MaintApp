<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// C'est cette ligne "return new class extends Migration" qui est cruciale !
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('authorId')->constrained('users');
    $table->string('title', 75);
    $table->string('metaTitle', 100)->nullable();
    $table->string('slug', 100);
    $table->tinyText('summary')->nullable();
    $table->boolean('published')->default(0);
    $table->dateTime('createdAt'); // Assure-toi que c'est bien écrit comme ça
    $table->dateTime('updatedAt')->nullable();
    $table->dateTime('publishedAt')->nullable();
    $table->text('content')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};