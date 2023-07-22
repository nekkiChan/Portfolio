<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Home;
use App\Models\Information;

class HomeController extends Controller
{
    /**
     * 初期画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $self = new Home;
        $information = new Information;
        $home = [
            'short' => $self->getData()['short'],
            'info' => $information->getData(),
        ];
        return view('home.index', [
            'home' => $home,
        ]);
    }
}
