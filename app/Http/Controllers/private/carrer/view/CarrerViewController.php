<?php

namespace App\Http\Controllers\private\carrer\view;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class CarrerViewController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * 画面表示
     */
    public function index(Request $request): View
    {
        foreach ($this->query_data as $name => $data) {
            $this->view_data->with($name, $data);
        }

        return $this->view_data;
    }
}
