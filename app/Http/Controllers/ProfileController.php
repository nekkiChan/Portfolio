<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * 初期画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $self = new Profile;

        /**
         * @var $data
         *
         * short_text: ショートプロフィール
         * main_text: メインプロフィール
         * concept_text: コンセプト
         * image_name: プロフィール画像
         */
        $data = [
            'short_text' => $self->getData()['short_text'],
            'main_text' => $self->getData()['main_text'],
            'concept_text' => $self->getData()['concept_text'],
            'image_name' => $self->getData()['image_name'],
        ];
        return view('profile.index', [
            'data' => $data
        ]);
    }
}
