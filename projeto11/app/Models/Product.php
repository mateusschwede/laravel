<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Product extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'title'
    ];

    public function images() {
        return $this->hasMany(ProductImage::class,'product','id');
    }
}