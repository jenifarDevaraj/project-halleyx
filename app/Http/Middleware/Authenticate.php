<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\District;
use App\Http\Controllers\HomeController;
use App\Models\User;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     // return $request->expectsJson() ? null : route('login');
    //     // return view('auth.login');
    //     return new Response(view('auth.login'));
    // }
    public function handle(Request $request, Closure $next)
    {
        // Perform your middleware logic here
        
        // For example, if you want to check something and return a view
        // if (!auth()->check()) {
        //     // If the user is not authenticated, render a view and return as response
        //     // return '/'; 
        //     $districts = District::all();
        //     $home = new HomeController();
        //     $userBasics=$home->profilesLoader(new Request());
        //     $referrer_data=null;
        //     $existingCode = $request->cookie('referrer_code');
        //     if($existingCode){
        //         $existingUser = User::where('user_code', $existingCode)->first();
        //         if ($existingUser) {
        //             $referrer_data=$existingUser;
        //         }
        //     }
        //     $view = view('auth.login', compact('districts','userBasics','referrer_data'));
        //     return response($view)->header('X-Test', '123');
        //     return new Response($view); 
        // }
        
        // If the user is authenticated, continue to the next middleware or route handler
        return $next($request);
    }
}
