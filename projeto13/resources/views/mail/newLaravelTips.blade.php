@component('mail::message')
    <h1>Título do email</h1>
    <p>Email para destinatário {{$user->name}}, cujo email é {{$user->email}}</p>
    @component('mail::button',['url'=>'mailto:emailRemetente?subject=Email resposta'])
        Responder
    @endcomponent
@endcomponent