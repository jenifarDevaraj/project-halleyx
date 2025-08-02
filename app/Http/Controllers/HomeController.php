<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $users=User::count();
                $orders=Order::count();
                return view('pages.admin.dashboard',[
                    'route_name'=>'dashboard','role_name'=>1
                ],compact('users','orders'));
            }
            if(getUserRoleName()=='customer'){
                $users=Auth::user();
                return view('pages.customer.profile.index',['route_name'=>'profile','role_name'=>1],compact('users'));
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function profile(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='customer'){
                $users=Auth::user();
                return view('pages.customer.profile.index',['route_name'=>'profile','role_name'=>1],compact('users'));
            }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function profile_submit(Request $request)
    {
        if($request->action=='profile')
        {
            $user = User::find(Auth::user()->id);
            $user->first_name = strtolower($request->first_name);
            $user->last_name = strtolower($request->last_name);
            $user->email = strtolower($request->email);
            $user->save();
            return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
        }
        if($request->action=='password')
        {
            $validator = Validator::make($request->all(), [
                'current' => 'required|string',  // Current password is required
                'new' => 'required|string|min:6|confirmed',  // New password must be at least 8 characters and match the confirmation
                'new_confirmation' => 'required|string|min:6',  // Confirm password is required
            ]);
            if($validator->fails()) {
                $firstError = $validator->errors()->first();
                
                // Return back to the profile page with the error names
                return redirect()->route('profile.index')
                    ->with('error', $firstError);  // Join them as a string (comma-separated)
            }
            
            $user = Auth::user();

            // Check if the current password is correct
            if (!Hash::check($request->current, $user->password)) {
                // If current password doesn't match, redirect with error
                return redirect()->route('profile.index')->with('error', 'Current password is incorrect.');
            }

            // If the current password is correct, update the password
            $user->password = Hash::make($request->new);  // Hash the new password
            $user->save();

            // Redirect with success message
            return redirect()->route('profile.index')->with('success', 'Password updated successfully.');
        }
    }
}
