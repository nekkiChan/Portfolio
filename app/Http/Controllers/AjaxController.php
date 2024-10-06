<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * Summary of check
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function checkUniqueData(Request $request)
    {
        $exists = DB::table($request->table)
            ->where($request->column, $request->value);

        if (Auth::check()) {
            if ($request->table == 's001_users') {
                $exists = $exists
                    ->where('id', '!=', Auth::user()->id);
            }
        }

        $exists = $exists->exists();

        return response()->json(['exists' => $exists]);
    }

}
