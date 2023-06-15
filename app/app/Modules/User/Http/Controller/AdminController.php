<?php

namespace App\Modules\User\Http\Controller;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
