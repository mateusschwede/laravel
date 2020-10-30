<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $table = 'posts';

    public function author() {
        return $this->belongsTo(User::class,'author','id'); //fk, pk
    }

    public function categories() {
        return $this->belongsToMany(Category::class,'posts_categories','post','category'); //Model relacionada, table pivô, fk da table pivô, outra fk
    }
}