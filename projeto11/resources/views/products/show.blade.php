<h2>Produto {{$product->title}}</h2>

@foreach($product->images as $image)
    <img src="{{env('APP_URL')}}/storage/{{$image->path}}">
@endforeach