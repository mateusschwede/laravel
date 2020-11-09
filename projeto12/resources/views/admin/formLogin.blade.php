<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

<form name="formLogin">
    @csrf
    
    <div class="alert alert-danger d-none messageBox" role="alert"></div>
        
    <input type="text" id="email" name="email" required placeholder="Email" value="mateus@gmail.com">
    <input type="password" id="password" name="password" required placeholder="Senha">
    <input type="submit" value="Login">
</form>

<script>
    $(function(){
        //alert('teste');
        $('form[name="formLogin"]').submit(function(event){
            event.preventDefault();
            //alert('teste2');
            //var email = $(this).find('input#email').val(); //Não será usado, mas pode também ser usado
            //alert(email);
            $.ajax({
                url: "{{route('admin.login.do')}}",
                type: "post",
                data: $(this).serialize(), //Pega tds inputs
                dataType: 'json', //Tipo de return da requisição
                success: function(response){
                    //console.log(response);
                    if(response.success === true) {
                        window.location.href = "{{route('admin')}}"; //Método Auth::attempt não verifica, corrigir
                        alert('foi');
                    } else {
                        //alert('Erro: '+response.message);
                        $('.messageBox').removeClass('d-none').html(response.message);
                    }
                }
            });
        });
    });
</script>