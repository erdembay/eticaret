<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('front.index');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function login()
    {
        return view('front.login');
    }
}
