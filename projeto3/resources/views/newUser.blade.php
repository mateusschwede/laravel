<form action="{{route('user.store')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Senha">
    <input type="submit" value="Adicionar">
</form>