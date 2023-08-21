<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model
{
    use HasFactory;

    protected $table = 'work_images';
    protected $fillable = ['status', 'work_id', 'image_name'];
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }

    /**
     * work_idに対応する画像の検索
     *
     * @param integer $id worksテーブルのid
     * @return string path名
     */
    public function searchImage($id)
    {
        $allWorkImage = WorkImage::all();
        foreach ($allWorkImage as $workImage) {
            if ($workImage->work_id == $id) {
                return 'storage/images/works/' . $workImage->image_name;
            }
        }
        return 'storage/sample/image.svg';
    }

    /**
     * データベース登録
     *
     * @param array 入力データ
     */
    public function insertWorkImage($data)
    {
        return $this->create([
            'status' => 'active',
            'work_id' => $data['work_id'],
            'image_name' => $data['image_name'],
        ]);
    }
}
