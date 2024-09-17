<?php

namespace App\Models\common;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CommonModel
{
    public function __construct()
    {
    }

    /**
     * ハッシュ化されたパスワードを生成
     * @param mixed $password
     * @return string
     */
    public static function generatePassword($password)
    {

        return Hash::make($password);
    }

}
