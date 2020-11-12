<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {

    public function index() {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request) {
    }

    public function show($id) {
    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {
    }
}