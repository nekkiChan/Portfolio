<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Information;

class InformationController extends Controller
{
    /**
     * タスク一覧
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $informations = Information::orderBy('created_at', 'asc')->get();
        return view('informations.index', [
            'informations' => $informations,
        ]);
    }
}
