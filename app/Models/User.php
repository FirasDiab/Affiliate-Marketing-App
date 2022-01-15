<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllUsers() {
        return DB::table('users')->where('user_role', 2)->get();
    }

    public function getCountRegisteredUsers() {
        return DB::table('users')->where('user_role', 2)->get()->count();
    }

    public function getReferralLink($user_id) {
        return DB::table('users')->where('id', $user_id)->value('referral-link');
    }

    public function getUsersRegisteredByUser($user_id) {
        return DB::table('users')->where('referral-by', $user_id)->get();
    }

    public function getCountRegisteredUsersByUser($user_id) {
        return DB::table('users')->where('referral-by', $user_id)->get()->count();
    }

    public function registeredUsersLast14Days()
    {
        return DB::table('users')->where('user_role',2)
                   ->where('created_at', '>', now()->subDays(14)->endOfDay())
                   ->get()->count();
    }

    public function registeredUsersByDailyBasis() {
        return DB::table('users')
            ->where('user_role', 2)
            ->where('created_at', '>', now()->subDays(14)->endOfDay())
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as "users_registered"')
            ]);
    }


}
