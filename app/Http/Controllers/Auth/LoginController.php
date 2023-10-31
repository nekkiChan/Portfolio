<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home'; // ログイン後のリダイレクト先

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function edit(){
        return view('administrators.edit');
    }
}
