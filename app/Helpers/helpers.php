<?php
if (!function_exists('getUserRoleName')) {
    function getUserRoleName()
    {
        if (Auth::check()) {
            $login_user = DB::table('users')
                ->select('user_roles.name as role_name')
                ->join('user_roles', 'users.role_id', '=', 'user_roles.role_id')
                ->where('users.role_id', Auth::user()->role_id)
                ->first();

            return $login_user->role_name ?? null;
        }

        return null;
    }
}
if (!function_exists('loginStatusChecker')) {
    function loginStatusChecker()
    {
        return (Auth::user())?1:0;
    }
}
