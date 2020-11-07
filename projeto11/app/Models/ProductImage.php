<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
    use HasFactory;

    protected $table = 'products_images';
    public $timestamps = false;

    public function Product() {
        return $this->belongsTo(Product::class,'product','id');
    }
}