<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;



class Checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // $user  = Auth::user();
        // var_dump(Auth::user()?->email);
        // var_dump( $user->email);

        if(Auth::user()?->email == "phamvanbk11@gmail.com"){
            return  redirect("/dashboard");
        }
        return $next($request);
    }
}
