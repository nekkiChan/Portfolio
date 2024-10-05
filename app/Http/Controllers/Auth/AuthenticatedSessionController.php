<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return $this->view_data;
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = $this->screen_model->getValidator($request);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->input();

        // カスタムの認証メソッドを使って認証
        $user = User::authenticate($credentials['name'], $credentials['password']);

        if ($user) {
            // 認証が成功した場合、ログインセッションを開始
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('public.mainmenu.index'));
        }

        $messages = [
            'ユーザー名またはパスワードが正しくありません。',
        ];

        // 認証に失敗した場合の処理
        return back()->withErrors($messages);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // 認証に使うフィールドをnameに変更
    public function username()
    {
        return 'name';
    }
}
