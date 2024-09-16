<?php

namespace App\Models\dbtables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M102ContentSubCategory extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'm102_content_subcategories';

    // 複数代入を許可するフィールド
    protected $fillable = [
        'name',
        'title',
        'body',
        'sort',
        'is_admin',
        'content_subcategory_id',
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
