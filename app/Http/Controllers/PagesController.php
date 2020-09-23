<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
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

    public function index() {
        return view('pages.index');
    }

    // User only
    public function charts() {
        return view('pages.charts');
    }

    //Admin only
    public function users() {
        // Check if admin
        if(!auth()->user()->isAdmin()){
            return redirect('/')->with('error', 'Unathorized Page');
        }

        $users = User::cursor()->filter(function ($user) {
            return !$user->isAdmin();
        });
        return view('pages.users')->with('users', $users);
    }

    public function singleuser($id) {
        // Check if admin
        if(!auth()->user()->isAdmin()){
            return redirect('/')->with('error', 'Unathorized Page');
        }
        
        $user = User::find($id);
        $sensors = $user->sensors;
        $showback = true;
        return view('sensors.index')->with(['sensors' => $sensors, 'showback' => $showback]);
    }
}
