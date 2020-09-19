<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function charts() {
        return view('pages.charts');
    }

    public function users() {
        //Admin only !!!
        return view('pages.users');
    }
}
