<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsCategoriesTable extends Migration {

    public function up() {
        Schema::create('posts_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('post');
            $table->unsignedBigInteger('category');
            $table->foreign('post')->references('id')->on('posts')->onDelete('CASCADE');
            $table->foreign('category')->references('id')->on('categories')->onDelete('CASCADE');
        });
    }

    public function down() {
        Schema::dropIfExists('posts_categories');
    }
}