<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\RegisterViews;

class HomeController extends Controller
{
    private $users;
    private $register_views;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->users            = new User();
        $this->register_views   = new RegisterViews();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $role = Auth::user()->user_role;

        if( $role == 2) {
            $referral_link = $this->users->getReferralLink($user_id);
            $users_list = $this->users->getUsersRegisteredByUser($user_id);
            $count_register_view = $this->register_views->getCountViewRegisteredPage();
            $count_users_register_by_user = $this->users->getCountRegisteredUsersByUser($user_id);
            $registered_users_last_14_days = $this->users->registeredUsersLast14Days();
            $registered_users_by_day = $this->users->registeredUsersByDailyBasis();
            $date = [];
            $count = [];
            foreach ($registered_users_by_day as $r) {
                array_push($date, $r->date);
                array_push($count, $r->users_registered);
            }

            $chartjs = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels($date)
                ->datasets([
                    [
                        "label" => "Number Of registered",
                        'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                        'data' => $count
                    ]
                ])
                ->options([]);

            return view('home', compact('referral_link', 'count_users_register_by_user',
                                              'count_register_view', 'users_list', 'registered_users_last_14_days',
                                              'registered_users_by_day', 'chartjs'));
        } elseif ($role == 1) {
            $all_users = $this->users->getAllUsers();
            foreach ($all_users as $user) {
                $user->number_of_refrred = $this->users->getCountRegisteredUsersByUser($user->id);
            }

            $count_users_registered = $this->users->getCountRegisteredUsers();

            return view('admin', compact('all_users', 'count_users_registered'));
        }

    }
}
