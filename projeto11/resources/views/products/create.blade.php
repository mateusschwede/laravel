<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Título">
    <input type="file" name="images[]" multiple>
    <input type="submit" value="Adicionar">
</form>