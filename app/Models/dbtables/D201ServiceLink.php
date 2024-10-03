<?php

namespace App\Models\dbtables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class D201ServiceLink extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'd201_service_links';

    // 複数代入を許可するフィールド
    protected $fillable = [
        'link_path',
        'file_path',
        'service_category_id',
        'content_body_id',
        'is_admin',
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

    // テーブル名を取得するメソッド
    public function getTableName()
    {
        return $this->getTable();
    }

    // 保有するカラム名を配列で取得するメソッド
    public function getColumnNames()
    {
        return Schema::getColumnListing($this->getTable());
    }
}
