<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = [
                'id' => 1,
                'name' => 'taro is jiro!!',
                'body' => 'YESYESYES!!!',
        ];

        return $data;
    }
}
