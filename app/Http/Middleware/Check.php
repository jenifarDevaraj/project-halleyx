<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if($request->id==10)
        // {
        //     echo $request->id;
        //     return response()->view('nopage');
        //     return redirect()->route('redirect-route');
        // }
        if(Auth::user())
        {
            return 1;
            // return redirect()->route('home');
        }
        return $next($request);
    }
}
