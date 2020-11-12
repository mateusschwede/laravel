<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class apiProtectedRoute extends BaseMiddleware {

    public function handle(Request $request, Closure $next) {
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch(\Exception $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status'=>'Token inválido']);
            } else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status'=>'Token expirado']);
            } else {
                return response()->json(['status'=>'Autorização não funcionou']);
            }
        }
        

        return $next($request);
    }
}