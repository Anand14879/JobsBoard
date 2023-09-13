<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CheckForAuth
{
    use AuthenticatesUsers;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 

public function handle(Request $request, Closure $next): Response
{
    $user = Auth::user();

    if ($user && $user->user_type ===  "Admin") {
        if(Str::contains($request->url(),'admin')){
            return $next($request);
        }else{
            $this->guard()->logout();
            return redirect()->route('home'); 
        }
    }else{
        return $next($request);

    }
}

}
