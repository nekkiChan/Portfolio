<?php

namespace App\Http\Controllers\private\contents\menu;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class ContentsMenuController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
