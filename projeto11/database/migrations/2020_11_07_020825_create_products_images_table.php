<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsImagesTable extends Migration {

    public function up() {
        Schema::create('products_images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();
            
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('id')->on('products')->onDelete('CASCADE');
        });
    }

    public function down() {
        Schema::dropIfExists('products_images');
    }
}