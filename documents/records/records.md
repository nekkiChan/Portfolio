# 活動記録

## 目次

- [活動記録](#活動記録)
  - [目次](#目次)
  - [240911](#240911)
  - [240912](#240912)
  - [240913](#240913)
  - [240914](#240914)
  - [240916](#240916)
  - [240917](#240917)
  - [240918](#240918)
  - [240919](#240919)
  - [241002](#241002)
  - [241003](#241003)
  - [241005](#241005)
  - [241006](#241006)
  - [241007](#241007)

## 240911

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240911)

2. 活動内容

- laravel環境構築

```bash
# gitcloneを行ったディレクトリ内で以下のコマンドを実行
composer create-project --prefer-dist laravel/laravel .
```

- インフラ構築

- laravel/breezeの導入

## 240912

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240912)

2. 活動内容

- メイン画面の作成

## 240913

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240913)

## 240914

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240914)

2. 活動内容

- コンテンツカテゴリテーブルの作成

- マイグレーションファイルの生成

```bash
# コマンドで実施
php artisan make:migration create_m101_content_categories --create=m101_content_categories
```

- マイグレーションファイルの編集

```php
# database/migrations/2024_09_14_133628_create_m101_content_categories.php
public function up(): void
{
    Schema::create('m101_content_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100)->comment('コンテンツカテゴリ名');
        $table->string('view', 100)->comment('表示名');
        $table->integer('sort')->comment('並び順');
        $table->boolean('is_admin')->default(false)->comment('認証表示');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

- モデルの編集

```php
# app\Models\dbtables\M101ContentCategory.php
namespace App\Models\dbtables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M101ContentCategory extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'm101_content_categories';

    // 複数代入を許可するフィールド
    protected $fillable = [
        'name',
        'view',
        'sort',
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
}
```

- configの編集

```php
# config/dbtables/m101_content_categories.php
use App\Models\dbtables\M101ContentCategory;

return [
    'table' => 'm101_content_categories',
    'dbmodel' => M101ContentCategory::class,
    'initdata' => [
        0 => [
            'name' => 'profile',
            'view' => 'プロフィール',
        ],
        1 => [
            'name' => 'career',
            'view' => '経歴',
        ],
        2 => [
            'name' => 'works',
            'view' => '実績',
        ],
    ],
];
```

- シーダーの生成

```php
# database/seeders/dbtables/InitM101Seeder.php
namespace Database\Seeders\dbtables;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InitM101Seeder extends Seeder
{
    private $dbtable;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->dbtable = "m101_content_categories";

        /**
         * @var array データベースの設定データ
         */
        $dbconfigdata = config("dbtables.{$this->dbtable}");

        /**
         * @var array 初期データ
         */
        $initdata = $dbconfigdata['initdata'];

        /**
         * @var Model dbtableのモデル
         */
        $dbmodel = $dbconfigdata['dbmodel'];

        foreach ($initdata as $key => $data) {
            $count = $dbmodel::where('is_delete', false)->count();
            $data['sort'] = $count;
            $dbmodel::create($data);
        }

    }
}
```

## 240916

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240916)

2. 活動内容

- 各テーブルの作成
  - ユーザーテーブル
  - 権限テーブル
  - コンテンツサブカテゴリテーブル
  - コンテンツボディテーブル
  - サービスカテゴリテーブル
  - サービスリンクテーブル
  - 作成手法は[240914](#240914)のコンテンツカテゴリテーブルと同じ。

- メイン画面の作成

- 認証機能の作成

## 240917

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240917)

2. 活動内容

   - 所有者テーブルの作成
   - アドミンユーザーのパスワード再設定

## 240918

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240918)

2. 活動内容

   - seederの追加
   - 所有者データ編集画面作成

## 240919

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/240919)

2. 活動内容

   - サイトアイコンの反映
   - プロフィールアイコンの反映

## 241002

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/241002)

2. 活動内容

   - コンテンツページの作成
     - コンテンツカテゴリの一覧画面・編集画面
     - コンテンツサブカテゴリの一覧画面・編集画面
     - コンテンツ情報の一覧画面・編集画面

## 241003

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/241003)

2. 活動内容

   - コンテンツページの作成
     - コンテンツ情報の一覧画面・編集画面

## 241005

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/241005)

2. 活動内容

   - メインメニュー画面のコンテンツデータの反映
   - プロフィール詳細画面の作成
   - 経歴詳細画面の作成
   - 実績詳細画面の作成
   - ユーザーメニュー画面の作成
   - ユーザー一覧画面の作成

## 241006

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/241006)

2. 活動内容

   - ユーザー編集画面の作成

## 241007

1. [該当ブランチ](https://github.com/nekkiChan/Portfolio/tree/241007)

2. 活動内容

   - CSSなどの調整
