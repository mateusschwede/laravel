<form action="{{route('debug')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Título">
    <input type="text" name="subtitle" placeholder="Subtítulo">
    <textarea name="content" cols="30" rows="10" placeholder="Conteúdo"></textarea>
    <input type="submit" value="Adicionar">
</form>