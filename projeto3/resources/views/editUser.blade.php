<form action="{{route('user.update',['user'=>$user->id])}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" placeholder="Nome" value="{{$user->name}}">
    <input type="email" name="email" placeholder="Email" value="{{$user->email}}">
    <input type="password" name="password" placeholder="Senha">
    <input type="submit" value="Atualizar">
</form>