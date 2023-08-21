<?php

namespace App\Models;

use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\WorksImage;
use App\Models\InformationImage;

class Common extends Model
{
    use HasFactory;

    /**
     * @var string|null 画像名
     */
    private $fileName;

    public function __construct()
    {
        $this->fileName = null;
    }

    /**
     * 画像名を取得する関数
     *
     * @return string|null
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * 画像名を変更する関数
     *
     * @param UploadedFile $file
     */
    private function changeFileName($file)
    {
        $currentDateTime = now(); // 現在の日時を取得
        $formattedDateTime = $currentDateTime->format('YmdHis'); // 年月日時分秒の形式にフォーマット

        $extension = $file->getClientOriginalExtension(); // ファイルの拡張子を取得
        $this->fileName = $formattedDateTime . '.' . $extension; // 新しいファイル名を生成
    }

    /**
     * 画像をアップロードする関数
     *
     * @param Request $request
     * @param string $path profile|works|informations|
     */
    public function uploadImageFile($request, $path)
    {
        $file = $request->file('image');
        $this->changeFileName($file);
        \Storage::putFileAs('public/images/' . $path, $file, $this->fileName); // 保存先のパスと新しいファイル名で保存
    }

    public function formatDateTime($date)
    {
        return $date->format('Y年m月d日');
    }
}
