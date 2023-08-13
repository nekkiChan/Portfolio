<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Login;

class LoginController extends Controller
{
    /**
     * 初期画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $self = new Login;

        $data = [
            'email' => $self->getData()['email'],
            'password' => $self->getData()['password'],
        ];
        return view('login.index', [
            'login' => $data
        ]);
    }
}
