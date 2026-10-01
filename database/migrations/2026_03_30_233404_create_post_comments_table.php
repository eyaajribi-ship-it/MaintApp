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
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postId')->constrained('posts')->onDelete('cascade');
            $table->unsignedBigInteger('parentId')->nullable();
            $table->string('title', 100);
            $table->boolean('published')->default(false);
            $table->dateTime('createdAt')->useCurrent(); 
            $table->dateTime('publishedAt')->nullable(); 
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_comments');
    }
};
