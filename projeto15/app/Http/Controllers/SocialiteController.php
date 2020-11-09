<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller {

    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback() {
        $user = Socialite::driver('facebook')->user();
        echo "<h1>Nome: {$user->getName()}</h1>";
        echo "<img src='{$user->getAvatar()}'>";
        //dd($user);
        // $user->token;
    }

    public function redirectToProviderGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle() {
        $user = Socialite::driver('google')->user();
        echo "<h1>Nome: {$user->getName()}</h1>";
        echo "<img src='{$user->getAvatar()}'>";
    }
}