<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Information;

class InformationController extends Controller
{
    /**
     * 一覧画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        // $informations = Information::orderBy('created_at', 'asc')->get();
        $informations = [
            [
                'id' => 1,
                'name' => 'taro',
            ],
        ];
        return view('informations.index', [
            'informations' => $informations,
        ]);
    }

    /**
     * 詳細画面
     *
     * @param Request $request
     * @return View
     */
    public function viewMore(Request $request)
    {
        return view('informations.more');
    }
}
