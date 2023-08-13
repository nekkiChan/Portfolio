<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];
        return $data;
    }
}
