<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function getData()
    {
        $home = [
            'short' =>
            "よく使用するプログラミング言語：HTML、PHP、CSS、Javascript\n
            "
        ];
        return $home;
    }
}
