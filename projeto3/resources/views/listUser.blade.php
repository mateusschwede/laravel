<h4>{{$user->name}}</h4>
<p>{{$user->email}}</p>
<p>{{date('d,m,Y H:i', strtotime($user->created_at))}}</p>