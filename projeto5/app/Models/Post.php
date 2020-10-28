<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

//Laravel converte tudo para minúsculo e plural ao BD, ou seja, a table relacionada precisa ser 'posts'

class Post extends Model {
    use HasFactory;
    protected $table = 'posts'; //caso o nome da table seja diferente que o padrão
    /*protected $fillable = [
        'title',
        'subtitle',
        'content'
    ]; //Somente usar caso optar pel método $post->create no controller PostController(e comentar os atributos e save() de $post) Método menos recomendado, somente qndo Model possui muitos atributos*/ 

    //setPropriedadeAttribute($valorPassadoAtributo)
    public function setTitleAttribute($value) {
        //Nesse método pode serem feitos if's, programações gerais para o atributo, Regras de Negócios
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}