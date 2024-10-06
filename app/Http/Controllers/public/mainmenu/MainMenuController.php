<?php

namespace App\Http\Controllers\public\mainmenu;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class MainMenuController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
