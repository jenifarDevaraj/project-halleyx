<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Courses;
use App\Models\CourseUsers;
use App\Models\CourseTopics;
use DB;
use App\Http\Controllers\CoursesController;
use App\Models\District;
use App\Models\UserImage;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if(getUserRoleName()=='admin'){
            $query = User::query();
                if ($request->has('keyword') && $request->keyword) {
                    $query->where('first_name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('email', 'like', '%' . $request->keyword . '%');
                }
                if ($request->has('sort_order')) {
                    $query->orderBy('first_name', $request->sort_order);
                }
                $users = $query->paginate(20);
            return view("pages.admin.users.list", [
                'route_name' => 'customers',
                'users' => $users
            ]);

        }
        // if(getUserRoleName()=='customer'){
        //     $courses = Courses::orderBy('order_no', 'asc')->get();
        //     return view("pages.customer.courses.list",['route_name'=>'users'],compact('courses'));
        // }
    }
    public function add(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                return view('pages.admin.users.add',['route_name'=>'customers','role_name'=>1]);
            }
            // if(getUserRoleName()=='customer'){
            //     return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            // }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function add_submit(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $user=new User;
                $user->first_name=strtolower($request->first_name);
                $user->last_name=strtolower($request->last_name);
                $user->email=strtolower($request->email);
                $user->password=Hash::make($request->password);
                $user->save();
                return redirect()->route('customers.index');
            }
            // if(getUserRoleName()=='customer'){
            //     return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            // }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function edit(Request $request,$id)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $users = User::where('id',$id)->first();
                return view('pages.admin.users.add',['route_name'=>'customers','role_name'=>1],compact('users'));
            }
            // if(getUserRoleName()=='customer'){
            //     return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            // }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function edit_submit(Request $request,$id)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $user = User::find($request->id);
                $user->first_name = strtolower($request->first_name);
                $user->last_name = strtolower($request->last_name);
                $user->email = strtolower($request->email);
                if ($request->has('password') && !empty($request->password)) {
                    $user->password = Hash::make($request->password);  // Hash the password
                }
                $user->save();
                return redirect()->route('customers.index');
            }
            // if(getUserRoleName()=='customer'){
            //     return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            // }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function delete_submit(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $user = User::find($request->id)->delete();
            }
            // if(getUserRoleName()=='customer'){
            //     return view('pages.admin.dashboard',['route_name'=>'dashboard','role_name'=>1]);
            // }
        }
        else{
            return view('auth.login',['route_name'=>'home','role_name'=>1]);//,compact('userBasics','referrer_data'));
        }
    }
    public function active_submit(Request $request)
    {
        if(Auth::user())
        {
            if(getUserRoleName()=='admin'){
                $user = User::find($request->id);
                $user->status = $user->status == 1 ? 0 : 1;
                $user->save();
            }
        }
    }
}
