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
   Schema::create('post_category', function (Blueprint $table) {
    $table->foreignId('postId')->constrained('posts')->onDelete('cascade'); 
    // Vérifie bien que c'est 'posts' avec un S !
    
    $table->foreignId('categoryId')->constrained('categories')->onDelete('cascade');
    // Vérifie bien que c'est 'categories' avec un S !
    
    $table->primary(['postId', 'categoryId']);
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_category');
    }
};
