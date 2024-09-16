<?php

namespace App\Models\dbtables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M201ServiceCategory extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'm201_service_categories';

    // 複数代入を許可するフィールド
    protected $fillable = [
        'link_path',
        'file_path',
        'sort',
        'icon_image_path',
        'is_disable',
        'is_delete',
        'created_by',
        'updated_by'
    ];

    // タイムスタンプを自動で管理しない場合
    public $timestamps = true;

    // created_at と updated_at のカラム名を設定
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
