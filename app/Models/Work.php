<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = [
                'id' => 1,
                'title' => 'Twitterクローン',
        ];

        return $data;
    }
}
