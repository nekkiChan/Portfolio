<?php

namespace App\Http\Controllers\private\profile\view;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class ProfileViewController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
