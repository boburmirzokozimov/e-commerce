<?php

namespace App\Modules\Product\Http\Controller;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }
}
