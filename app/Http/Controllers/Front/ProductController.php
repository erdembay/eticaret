<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
