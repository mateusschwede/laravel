<?php
namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller {

    public function index() {
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show(Address $address) {
        if ($address) {
            // O correto seria levar isso à uma view, isso fora feito somente para simplificar
            echo "<p>(Ida)Address: {$address->street},{$address->number} {$address->city}/{$address->state}</p>";
        }

        $user = $address->user()->first();
        if ($user) {
            // O correto seria levar isso à uma view, isso fora feito somente para simplificar
            echo "<p>(Volta)User: {$user->name},{$user->email}</p>";
        }
    }

    public function edit(Address $address) {
    }

    public function update(Request $request, Address $address) {
    }

    public function destroy(Address $address) {
    }
}