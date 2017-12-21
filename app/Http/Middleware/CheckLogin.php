<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$request->token){
            return reponse()->json([
                'status'=>'error',
                'message' =>'token is missed'
            ]);
        }

        $user = JWTAuth::parseToken()->toUser();
        session([
            'user'=>$user
        ]);
        return $next($request);
    }
}
