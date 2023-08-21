<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table = 'works';
    protected $fillable = ['status', 'title', 'explanation', 'comment'];
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }
    
    /**
     * データベース登録
     *
     * @param array 入力データ
     */
    public function insertWork($data)
    {
        return $this->create([
            'status' => 'active',
            'title' => $data['title'],
            'explanation' => $data['explanation'],
            'comment' => $data['comment'],
        ]);
    }
}
