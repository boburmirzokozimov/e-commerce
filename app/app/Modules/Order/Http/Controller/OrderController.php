<?php

namespace App\Modules\Order\Http\Controller;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }
}
