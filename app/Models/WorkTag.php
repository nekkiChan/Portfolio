<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTag extends Model
{
    use HasFactory;

    protected $table = 'work_tags';
    protected $fillable = ['status', 'work_id', 'tag_name'];

    /**
     * データベース登録
     *
     * @param array 入力データ
     */
    public function insertWorkTag($data)
    {
        return $this->create([
            'status' => 'active',
            'work_id' => $data['work_id'],
            'tag_name' => $data['tag_name'],
        ]);
    }
}
