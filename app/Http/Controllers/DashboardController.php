<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        //$jobs = Job::orderBy('created_at', 'desc', 'name')->paginate(4);
        $jobs = Job::join('users', 'jobs.user_id', '=', 'id')
                ->where('user_id', '=', $user_id)
                ->orderBy('jobs.created_at', 'desc')
                ->paginate(3, array('jobs.*'));

        return view('dashboard')->with('jobs', $jobs)->with('user', $user);
    }
}
