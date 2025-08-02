<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogoutOtherSessionsOnLogin
{
    public function handle(Login $event)
    {
        $userId = $event->user->id;
        $currentSessionId = Session::getId();

        // Update the current session record with user_id
        DB::table('sessions')
            ->where('id', $currentSessionId)
            ->update(['user_id' => $userId]);

        // Delete all other sessions for this user except the current session
        DB::table('sessions')
            ->where('user_id', $userId)
            ->where('id', '!=', $currentSessionId)
            ->delete();
    }
}
