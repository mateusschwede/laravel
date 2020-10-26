<?php
namespace App\Http\Controllers\Form;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/*Código abaixo criado automaticamente com o comando:
php artisan make:controller Form\TestController --resource --model=User
(--resource cria todos os métodos do controller: verbalização rest e injeções de dependência automaticamente)
(--model=User criará automaticamente toda injeção de dependências dos demais parâmetros relacionados à model User)*/

class TestController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Listar views/recursos
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Criar form para criar nova view/recurso
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Add dados em BD
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //Mostrar dado de BD
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //Mostrar form de edição à determinada view/recurso
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //Edita dado de BD
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    //Remove dado de BD
    public function destroy(User $user)
    {
        //
    }
}
