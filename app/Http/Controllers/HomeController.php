<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Home;
use App\Models\Profile;
use App\Models\Work;
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
        $profile = new Profile;
        $work = new Work;

        $home = [
            'short_text' => $profile->getData()['short_text'],
            'info' => $information->getData(),
            'work' => $work->getData()['title'],
        ];
        return view('home.index', [
            'home' => $home
        ]);
    }
}
