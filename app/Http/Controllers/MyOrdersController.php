<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    //
    public function index()
    {
        return view('front.my_orders');
    }
    public function detail()
    {
        return view('front.my_orders_detail');
    }
}
