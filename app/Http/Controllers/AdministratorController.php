<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Administrator;

class AdministratorController extends Controller
{
    protected $administrator;
    public function __construct()
    {
        $this->administrator = new Administrator;
    }


    public function create()
    {
        // 登録画面の表示
        return view('administrators.create');
    }

    public function store(Request $request)
    {
        // フォームデータのバリデーション
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:administrators',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // ログイン情報の登録
        Administrator::register($validatedData);

        // 成功時のリダイレクト先などを設定して返す
    }

    public function edit()
    {
        // 編集画面の表示
        $administrator = Auth::user(); // ログインユーザーの取得
        return view('administrators.profile.edit', compact('administrator'));
    }

    public function update(Request $request)
    {
        // フォームデータのバリデーション
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:administrators,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // ログイン情報の編集
        $administrator = Auth::user();
        $administrator->updateProfile($validatedData);

        // 成功時のリダイレクト先などを設定して返す
    }
}
