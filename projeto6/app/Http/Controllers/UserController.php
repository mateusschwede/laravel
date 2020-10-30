<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show($id) {
        $user = User::where('id',$id)->first();
        dd($user);
    }

    public function edit($id) {
    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {
    }
}