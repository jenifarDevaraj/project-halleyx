<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role() {
        // return $this->belongsTo(UserRoles::class, 'role_id');
        return $this->belongsTo(UserRoles::class, 'role_id', 'role_id');
    }
    public function district() {
        return $this->belongsTo(District::class, 'district_id', 'district_id');
    }
    public static function generateUserCode()
    {
        do {
            $code = strtoupper(Str::random(6)); // generates A-Z, 0-9
            $code = preg_replace('/[^A-Z]/', '', $code); // remove numbers
            $code = substr($code, 0, 6); // ensure it's 6 characters

        } while (strlen($code) < 6 || self::where('user_code', $code)->exists());

        return $code;
    }
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_code', 'user_code');
    }
    public function referredUsers()
    {
        return $this->hasMany(User::class, 'referrer_code', 'user_code');
    }
    public function courseUsers()
    {
        return $this->hasMany(CourseUsers::class, 'user_id');
    }
}
