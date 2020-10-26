<table border=1>
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Ações</td>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            <a href="{{route('user.show',['user'=>$user->id])}}">Ver</a>
            <form action="{{route('user.destroy',['user'=>$user->id])}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Remover">
            </form>
        </td>
    </tr>
    @endforeach
</table>