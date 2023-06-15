<?php

namespace App\Modules\Tag\Http\Controller;

use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index');
    }
}
