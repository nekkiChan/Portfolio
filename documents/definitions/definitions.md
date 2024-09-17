# ポートフォリオ定義書

## 目次

- [ポートフォリオ定義書](#ポートフォリオ定義書)
  - [目次](#目次)
  - [データベース](#データベース)
    - [テーブル情報](#テーブル情報)
    - [システムデータ](#システムデータ)
      - [ユーザーテーブル](#ユーザーテーブル)
      - [権限テーブル](#権限テーブル)
      - [所有者テーブル](#所有者テーブル)
    - [コンテンツデータ](#コンテンツデータ)
      - [コンテンツカテゴリテーブル](#コンテンツカテゴリテーブル)
      - [コンテンツサブカテゴリテーブル](#コンテンツサブカテゴリテーブル)
      - [コンテンツボディテーブル](#コンテンツボディテーブル)
    - [サービスデータ](#サービスデータ)
      - [サービスカテゴリテーブル](#サービスカテゴリテーブル)
      - [サービスリンクテーブル](#サービスリンクテーブル)

## データベース

### テーブル情報

### システムデータ

```php
$category = "テーブルの種別";
$id = "2桁の固有番号";
$name = "テーブル名";

$tablename = "{$category}0{$id}_{$name}";
```

#### ユーザーテーブル

```php
public function up(): void
{
    Schema::create('s001_users', function (Blueprint $table) {
        $table->id();
        $table->string('name')->comment('ユーザー名');
        $table->string('email')->nullable()->unique()->comment('メールアドレス');
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password')->comment('パスワード');
        $table->integer('role_id')->default(1)->comment('権限ID');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

#### 権限テーブル

```php
public function up(): void
{
    Schema::create('s002_roles', function (Blueprint $table) {
        $table->id();
        $table->string('name')->comment('権限名');
        $table->integer('level')->default(1)->comment('権限レベル');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

#### 所有者テーブル

```php
public function up(): void
{
    Schema::create('s003_owners', function (Blueprint $table) {
        $table->id();
        $table->string('name')->comment('所有者名');
        $table->string('profile_icon_path')->nullable()->comment('プロフィールアイコンパス');
        $table->string('favicon_icon_path')->nullable()->comment('サイトアイコンパス');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

### コンテンツデータ

```php
$category = "テーブルの種別";
$id = "2桁の固有番号";
$name = "テーブル名";

$tablename = "{$category}1{$id}_{$name}";
```

#### コンテンツカテゴリテーブル

```php
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

#### コンテンツサブカテゴリテーブル

```php
public function up(): void
{
    Schema::create('m102_content_subcategories', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100)->comment('コンテンツサブカテゴリ名');
        $table->string('view', 100)->comment('表示名');
        $table->integer('sort')->comment('並び順');
        $table->boolean('is_admin')->default(false)->comment('認証表示');
        $table->integer('content_category_id')->nullable()->comment('コンテンツカテゴリID');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

#### コンテンツボディテーブル

```php
public function up(): void
{
    Schema::create('d101_content_bodies', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100)->comment('コンテンツボディ名');
        $table->string('title', 100)->comment('タイトル');
        $table->text('body')->nullable()->comment('内容');
        $table->integer('sort')->comment('並び順');
        $table->boolean('is_admin')->default(false)->comment('認証表示');
        $table->integer('content_subcategory_id')->nullable()->comment('コンテンツサブカテゴリID');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

### サービスデータ

```php
$category = "テーブルの種別";
$id = "2桁の固有番号";
$name = "テーブル名";

$tablename = "{$category}2{$id}_{$name}";
```

#### サービスカテゴリテーブル

```php
public function up(): void
{
    Schema::create('m201_service_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100)->comment('サービス名');
        $table->string('view', 100)->comment('表示名');
        $table->string('icon_image_path', 100)->nullable()->comment('アイコン画像パス');
        $table->integer('sort')->comment('並び順');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```

#### サービスリンクテーブル

```php
public function up(): void
{
    Schema::create('d201_service_links', function (Blueprint $table) {
        $table->id();
        $table->string('link_path', 200)->nullable()->comment('リンクパス');
        $table->string('file_path', 200)->nullable()->comment('ファイルパス');
        $table->boolean('is_admin')->default(false)->comment('認証表示');
        $table->integer('service_category_id')->nullable()->comment('サービスカテゴリID');
        $table->integer('content_body_id')->nullable()->comment('コンテンツボディID');
        $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
        $table->boolean('is_delete')->default(false)->comment('削除フラグ');
        $table->timestamp('created_at')->useCurrent()->comment('作成日');
        $table->integer('created_by')->nullable()->comment('作成者');
        $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        $table->integer('updated_by')->nullable()->comment('更新者');
    });
}
```
