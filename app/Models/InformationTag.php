<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationTag extends Model
{
    use HasFactory;

    protected $table = 'information_tags';
    protected $fillable = ['status', 'information_id', 'tag_name'];

    /**
     * データベース登録
     *
     * @param array 入力データ
     */
    public function insertInformationTag($data)
    {
        return $this->create([
            'status' => 'active',
            'information_id' => $data['information_id'],
            'tag_name' => $data['tag_name'],
        ]);
    }
}
