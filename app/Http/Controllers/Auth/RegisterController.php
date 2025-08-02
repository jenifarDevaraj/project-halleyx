<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRegister;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\UserDetailChange;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    public function register_page(Request $request)
    {
        return view('auth.register',['route_name'=>'dashboard','role_name'=>1]);
    }
    public function register_submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if ($validator->fails()) {
            $firstError = collect($validator->errors()->all())->first();
            return response()->json([
                'status' => 'error',
                'message' => $firstError
            ], 200);
        }
        if(User::where('email', '=', $request->email)->count())
        {
            return response()->json(['status'=>'error','message'=>'Email already exists'], 200);
        }
        $userRegister=new User;
        $userRegister->first_name=strtolower($request->first_name);
        $userRegister->last_name=strtolower($request->last_name);
        $userRegister->email=strtolower($request->email);
        $userRegister->password=Hash::make($request->password);
        $userRegister->save();
        Auth::login($userRegister);
        return response()->json(['status'=>'success'], 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|nullable|min:6'
        ]);
        if ($validator->fails()) {
            $firstError = collect($validator->errors()->all())->first();
            return response()->json([
                'status' => 'error',
                'message' => $firstError
            ], 200);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['status'=>'error','message'=>'Invalid crendials'], 200);
        }
        if ($user->status == 0) {
            return response()->json(['status'=>'error','message'=>'Your account is blocked'], 200);
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            Auth::login($user);
            return response()->json(['status'=>'success','message'=>'logged in'], 200);
        }
        else{return response()->json(['status'=>'error','message'=>'Invalid crendials'], 200);}
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['status'=>'success'], 200);
    }
    public function api_login(Request $request)
    {
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json(['status'=>true,'token' => $token], 200);
        }
        return response()->json(['status'=>false,'error' => 'Unauthorized'], 401);
    }
    public function sendOtp($name,$value,$otp)
    {
        if($name=='phone'){
            $response = Http::get('https://site.ping4sms.com/api/smsapi', [
                'key'=>'7d09d924c3290726f665566a162e4fc4',
                'route'=>4,
                'sender'=>'PNGOTP',
                'number'=>$value,
                'sms'=>"Dear Customer, Welcome to santhosh.place, We are very happy to serve you. Your OTP Verification Code is $otp. Thank You -PNGOTP",
                'templateid'=>'1207168111666508111'
            ]);
        }
        if($name=='email'){
            $data = new \stdClass();
            $data->otp = $otp;
            Mail::to($value)->send(new OtpMail($data));
        }
    }
    public function forgotCheck(Request $request) {
        if (!User::where($request->source, $request->source_value)->first()) {
            return response()->json([ 
                'status' => 'error',
                'value'  => 'The ' . strtolower($request->source) . ' is not exists'
            ], 200);
        }
        else{
            $oldRecord = UserDetailChange::where($request->source, $request->source_value);
            if($oldRecord){$oldRecord->delete();}
            $newRecord = new UserDetailChange();
            $newRecord->{$request->source} = $request->source_value;
            $otp=rand(100000, 999999);
            $response = $this->sendOtp($request->source,$request->source_value, $otp);
            $newRecord->otp=$otp;
            $newRecord->save();
            return response()->json([ 
                'status' => 'success',
            ], 200);
        }
    }
    public function forgotCheckSubmit(Request $request) {
        if (!UserDetailChange::where([$request->source=>$request->source_value,'otp'=>$request->otp_reset,])->first()) {
            return response()->json([ 
                'status' => 'error',
                'value'  => 'OTP is not valid'
            ], 200);
        }
        else{
            $oldRecord = UserDetailChange::where($request->source, $request->source_value);
            if($oldRecord){$oldRecord->delete();}
            $userTable = User::where($request->source,$request->source_value)->first();
            $userTable->password = Hash::make($request->password_reset);
            $userTable->save();
            Auth::login($userTable);
            return response()->json([ 
                'status'=>'success',
                'value'=>'Successfully Changed'
            ], 200);
        }
    }
    public function getReferrer(Request $request){
        if (strlen($request->referrer_code)!=6) {
            return response()->json([ 
                'status' => 'error',
                'value'  => 'Code not Exists'
            ], 200);
        }
        else if (!User::where(['user_code'=>$request->referrer_code])->first()) {
            return response()->json([ 
                'status' => 'error',
                'value'  => 'Code not Exists'
            ], 200);
        }
        else{
            $userTable = User::where('user_code',$request->referrer_code)->first();
            return response()->json([ 
                'status'=>'success',
                'value'=>"{$request->referrer_code} : {$userTable->name}",
                'code'=>$request->referrer_code
            ], 200);
        }
    }
    public function setCode(Request $request, $code)
    {
        $code=strtoupper($code);
        $existingCode = $request->cookie('referrer_code');
        if ($existingCode) {
            $existingUser = User::where('user_code', $existingCode)->first();
            if ($existingUser) {
                return redirect('/');
            }
            $newUser = User::where('user_code', $code)->first();
            if ($newUser) {
                $minutes = 60 * 24 * 30;
                return redirect('/')->withCookie(cookie('referrer_code', $code, $minutes));
            }
            return redirect('/');
        }
        $newUser = User::where('user_code', $code)->first();
        if ($newUser) {
            $minutes = 60 * 24 * 30;
            return redirect('/')->withCookie(cookie('referrer_code', $code, $minutes));
        }
        return redirect('/');
    }
}
// php artisan make:mail OtpMail