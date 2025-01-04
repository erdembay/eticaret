<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('front.products');
    }
    public function detail($id)
    {
        return view('front.product_detail');
    }
}
