<?php

namespace App\Http\Controllers\private\contents\link;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class ContentLinkListController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
