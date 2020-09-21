<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.users');
    }
}
