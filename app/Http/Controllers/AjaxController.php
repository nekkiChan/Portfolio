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
            // 利用者データ
            switch ($request->table) {
                case 's001_users':
                    switch ($request->column) {
                        case 'name':
                            if ($exists->count() > 1) {
                                return response()->json(['exists' => true]);
                            } else {
                                return response()->json(['exists' => false]);
                            }
                        case 'email':
                            $exists = $exists
                                ->where('email', '!=', '');
                            break;
                    }
                    break;
            }
        }

        $exists = $exists->exists();

        return response()->json(['exists' => $exists]);
    }

}
