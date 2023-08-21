<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Common;

class InformationImage extends Model
{
    use HasFactory;

    protected $table = 'information_images';
    protected $fillable = ['status', 'information_id', 'image_name'];
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }

    /**
     * information_idに対応する画像の検索
     *
     * @param integer $id informationsテーブルのid
     * @return string path名
     */
    public function searchImage($id)
    {
        $allInformationImage = InformationImage::all();
        foreach ($allInformationImage as $informationImage) {
            if ($informationImage->information_id == $id) {
                return 'storage/images/informations/' . $informationImage->image_name;
            }
        }
        return 'storage/sample/image.svg';
    }

    /**
     * データベース登録
     *
     * @param array 入力データ
     */
    public function insertInformationImage($data)
    {
        return $this->create([
            'status' => 'active',
            'information_id' => $data['information_id'],
            'image_name' => $data['image_name'],
        ]);
    }
}
