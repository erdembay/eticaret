<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        return view('front.cart');
    }
    public function checkout(Request $request)
    {
        return view('front.checkout');
    }
}
