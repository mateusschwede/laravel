<form action="{{route('users.store')}}" method="post">
    <!--CSRF é o token de validação para cadastros em Laravel-->
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Cadastrar">
</form>