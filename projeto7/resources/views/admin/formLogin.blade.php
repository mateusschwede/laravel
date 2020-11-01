<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<form action="{{route('admin.login.do')}}" method="post">
    @csrf
    
    @if($errors->all())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    @endif
    <input type="text" name="email" required placeholder="Email" value="mateus7@gmail.com">
    <input type="password" name="password" required placeholder="Senha">
    <input type="submit" value="Login">
</form>