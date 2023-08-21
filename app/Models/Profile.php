<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * データ管理
     *
     * @return array
     */
    public function getData()
    {
        /**
         * @var $data
         *
         * short_text: ショートプロフィール
         * main_text: メインプロフィール
         * concept_text: コンセプト
         * image_name: プロフィール画像
         */
        $data = [
            'short_text' =>"よく使用するプログラミング言語\nHTML、PHP、CSS、Javascript",
            'main_text' =>
            "メイン",
            'concept_text' =>
            "少しでも楽に。少しでも楽しく。",
            'image_name' => 'storage/'.'images/profile/profile.JPG',
            ''
        ];
        return $data;
    }
}
