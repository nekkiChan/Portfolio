<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Work;

class WorkController extends Controller
{
    /**
     * 初期画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $self = new Work;

        $works = [
            'title' => $self['title'],
        ];
        return view('works.index', [
            'works' => $works
        ]);
    }
}
