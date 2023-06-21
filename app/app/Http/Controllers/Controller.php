<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Log\Logger;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct(protected Logger $logger)
    {
    }

    use AuthorizesRequests, ValidatesRequests;
}
