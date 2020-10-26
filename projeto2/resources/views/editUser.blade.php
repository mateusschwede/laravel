<!--user Parâmetro route => $user Var método controller -> parâmetro método-->
<form action="{{route('users.edit',['user'=>$user->id])}}" method="post">
    @csrf
    @method('PUT')
    <!--@method('patch')-->
    <input type="text" name="name" placeholder="Nome" value="{{$user->name}}">
    <input type="email" name="email" placeholder="Email" value="{{$user->email}}">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Atualizar">
</form>