<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user())
        {
            return redirect()->route('home');
        }
        $db=DB::table('users')
        ->select('user_roles.name as name')
        ->join('user_roles','users.role_id','=','user_roles.role_id')
        ->where(['users.id'=>Auth::user()->id])
        ->first();
        if($db->name!='customer'){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
