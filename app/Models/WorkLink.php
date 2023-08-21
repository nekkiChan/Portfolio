<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLink extends Model
{
    use HasFactory;

    protected $table = 'work_links';
    protected $fillable = ['status', 'work_id', 'link_url', 'link_name'];

    /**
     * データベース登録
     *
     * @param array 入力データ
     */
    public function insertWorkLink($data)
    {
        return $this->create([
            'status' => 'active',
            'work_id' => $data['work_id'],
            'link_url' => $data['link_url'],
            'link_name' => $data['link_name'],
        ]);
    }
}
