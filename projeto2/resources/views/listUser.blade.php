<h1>Detalhes do User</h1>
<h2>{{$user->name}}</h2>
<p>{{$user->email}}</p>
<p>{{date('d/m/Y',strtotime($user->created_at))}}</p>