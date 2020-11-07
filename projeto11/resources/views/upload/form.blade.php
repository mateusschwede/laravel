<form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="arquivo">
    <input type="submit" value="Enviar">
</form>