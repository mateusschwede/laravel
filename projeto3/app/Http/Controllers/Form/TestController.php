<?php
namespace App\Http\Controllers\Form;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*Código abaixo criado automaticamente com o comando:
php artisan make:controller Form\TestController --resource --model=User
(--resource cria todos os métodos do controller: verbalização rest e injeções de dependência automaticamente)
(--model=User criará automaticamente toda injeção de dependências dos demais parâmetros relacionados à model User)*/

class TestController extends Controller {

    //Listar views/recursos
    public function index() {
        $user = User::all();
        return view('listAllUsers',[
            'users'=>$user
        ]);
    }

    //Criar form para criar nova view/recurso
    public function create() {
        return view('newUser');
    }

    //Add dados em BD
    public function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');
    }

    //Mostrar dado de BD
    public function show(User $user) {
        return view('listUser',[
            'user'=>$user
        ]);
    }

    //Mostrar form de edição à determinada view/recurso
    public function edit(User $user) {
        return view('editUser',[
            'user'=>$user
        ]);
    }

    //Edita dado de BD
    public function update(Request $request, User $user) {
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($user->password)) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->route('user.index');
    }

    //Remove dado de BD
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index');
    }
}
