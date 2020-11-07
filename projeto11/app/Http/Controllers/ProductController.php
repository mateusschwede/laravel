<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index() {
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        //dd($request->all());        
        //var_dump($request->all());

        //Add product
        $product = new Product();
        $product->title = $request->title;
        $product->save();

        //Add image(s)
        for ($i=0; $i<count($request->allFiles()["images"]); $i++) {
            //var_dump($i);

            $file = $request->allFiles()["images"][$i];
            $productImage = new ProductImage();
            $productImage->product = $product->id;
            $productImage->path = $file->store('pastaProdutos/'.$product->id);
            $productImage->save();
            unset($productImage);
        }
    }

    public function show($id) {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }

    public function edit($id) {
    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {
    }
}