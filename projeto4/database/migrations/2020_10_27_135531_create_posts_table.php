<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
    
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->text('content');
            $table->timestamps();

            //Relacionamento com table categories (pd ser criado em outra migration, mas dessa forma fica mais organizado)
            $table->unsignedBigInteger('author');
            //FK 'author' referencia campo 'id' da table 'users', onDelete relacionado em cascata(pd ser onUpdate tbm, de acordo com projeto)
            //Cascade: Qndo deleto um User, seu Post tbm é removido, pra ñ ficar rasuras no BD
            $table->foreign('author')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down() {
        Schema::dropIfExists('posts');
    }
}