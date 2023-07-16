# データベース定義書

| バージョン | 更新日     | 更新者                                    |
| ---------- | ---------- | ----------------------------------------- |
| 1.00       | 2023/07/16 | [nekkiChan](https://github.com/nekkiChan) |

---

## 目次

- [データベース定義書](#データベース定義書)
  - [目次](#目次)
  - [データベース定義](#データベース定義)
    - [テーブル一覧](#テーブル一覧)
    - [ER図](#er図)
    - [仕様](#仕様)
      - [データベース仕様](#データベース仕様)
    - [実績](#実績)
    - [実績画像](#実績画像)
    - [実績リンク](#実績リンク)
    - [実績タグ](#実績タグ)
    - [お知らせ](#お知らせ)
    - [お知らせ画像](#お知らせ画像)
    - [お知らせタグ](#お知らせタグ)
  - [他のページへ](#他のページへ)
  - [更新履歴](#更新履歴)

---

## データベース定義

### テーブル一覧

| No  | テーブル名   | 物理名            | 説明                 |
| --- | ------------ | ----------------- | -------------------- |
| 1   | 実績         | works             | 実績テーブル         |
| 2   | 実績画像     | work_image        | 実績画像テーブル     |
| 3   | 実績リンク   | work_link         | 実績リンクテーブル   |
| 4   | 実績タグ     | work_tag          | 実績タグテーブル     |
| 5   | お知らせ     | informations      | お知らせテーブル     |
| 6   | お知らせ画像 | information_image | お知らせ画像テーブル |
| 7   | お知らせタグ | information_tag   | お知らせタグテーブル |

### ER図

![ER図](draw/img/portfolio-ER.svg)
| 画像作成者 | 画像作成/更新日                           |
| ---------- | ----------------------------------------- |
| 2023/07/16 | [nekkiChan](https://github.com/nekkiChan) |

### 仕様

#### データベース仕様

| 項目           | 内容               | メモ |
| -------------- | ------------------ | ---- |
| データベース名 | portfolio          | -    |
| 文字コード     | utf8mb4            | -    |
| 照合順序       | utf8mb4_general_ci | -    |

### 実績

| No  | カラム名    | 型           | 必須    | インデックス | デフォルト   | コメント                        |
| --- | ----------- | ------------ | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id          | int          | Yes(PK) | Yes          |              | ID                              |
| 2   | status      | varchar(20)  | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | title       | varchar(254) | Yes     | Yes          |              | 制作物名                        |
| 4   | explanation | text         | Yes     |              | NoData       | 制作物の説明                    |
| 5   | comment     | text         |         |              | Null         | 説明以外のコメント              |
| 6   | created_at  | datetime     | Yes     |              | CURRENT_TIME | 作成日                          |
| 7   | updated_at  | datetime     | Yes     |              | CURRENT_TIME | 更新日                          |

### 実績画像

| No  | カラム名   | 型           | 必須    | インデックス | デフォルト   | コメント                        |
| --- | ---------- | ------------ | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id         | int          | Yes(PK) | Yes          |              | ID                              |
| 2   | status     | varchar(20)  | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | work_id    | int          | Yes     | Yes          |              | 実績ID                          |
| 4   | image_name | varchar(100) | Yes     | Yes          |              | 画像名                          |
| 5   | created_at | datetime     | Yes     |              | CURRENT_TIME | 作成日                          |
| 6   | updated_at | datetime     | Yes     |              | CURRENT_TIME | 更新日                          |

### 実績リンク

| No  | カラム名   | 型           | 必須    | インデックス | デフォルト   | コメント                        |
| --- | ---------- | ------------ | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id         | int          | Yes(PK) | Yes          |              | ID                              |
| 2   | status     | varchar(20)  | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | work_id    | int          | Yes     | Yes          |              | 実績ID                          |
| 4   | link_url   | varchar(254) | Yes     | Yes          |              | 制作物URL                       |
| 5   | link_name  | varchar(50)  | Yes     | Yes          |              | リンクしているサービス名        |
| 6   | created_at | datetime     | Yes     |              | CURRENT_TIME | 作成日                          |
| 7   | updated_at | datetime     | Yes     |              | CURRENT_TIME | 更新日                          |

### 実績タグ

| No  | カラム名   | 型          | 必須    | インデックス | デフォルト   | コメント                        |
| --- | ---------- | ----------- | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id         | int         | Yes(PK) | Yes          |              | ID                              |
| 2   | status     | varchar(20) | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | work_id    | int         | Yes     | Yes          |              | 実績ID                          |
| 4   | tag_name   | varchar(50) | Yes     | Yes          |              | タグ名                          |
| 5   | created_at | datetime    | Yes     |              | CURRENT_TIME | 作成日                          |
| 6   | updated_at | datetime    | Yes     |              | CURRENT_TIME | 更新日                          |

### お知らせ

| No  | カラム名    | 型           | 必須    | インデックス | デフォルト   | コメント                        |
| --- | ----------- | ------------ | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id          | int          | Yes(PK) | Yes          |              | ID                              |
| 2   | status      | varchar(20)  | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | title       | varchar(254) | Yes     | Yes          |              | お知らせタイトル                |
| 4   | explanation | text         | Yes     |              | NoData       | お知らせの内容                  |
| 5   | work_id     | int          |         |              | Null         | 実績ID                          |
| 6   | created_at  | datetime     | Yes     |              | CURRENT_TIME | 作成日                          |
| 7   | updated_at  | datetime     | Yes     |              | CURRENT_TIME | 更新日                          |

### お知らせ画像

| No  | カラム名       | 型           | 必須    | インデックス | デフォルト   | コメント                        |
| --- | -------------- | ------------ | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id             | int          | Yes(PK) | Yes          |              | ID                              |
| 2   | status         | varchar(20)  | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | information_id | int          | Yes     | Yes          |              | お知らせID                      |
| 4   | image_name     | varchar(100) | Yes     | Yes          |              | 画像名                          |
| 5   | created_at     | datetime     | Yes     |              | CURRENT_TIME | 作成日                          |
| 6   | updated_at     | datetime     | Yes     |              | CURRENT_TIME | 更新日                          |

### お知らせタグ

| No  | カラム名       | 型          | 必須    | インデックス | デフォルト   | コメント                        |
| --- | -------------- | ----------- | ------- | ------------ | ------------ | ------------------------------- |
| 1   | id             | int         | Yes(PK) | Yes          |              | ID                              |
| 2   | status         | varchar(20) | Yes     | Yes          | active       | ステータス ('active'or'delete') |
| 3   | information_id | int         | Yes     | Yes          |              | お知らせID                      |
| 4   | tag_name       | varchar(50) | Yes     | Yes          |              | タグ名                          |
| 5   | created_at     | datetime    | Yes     |              | CURRENT_TIME | 作成日                          |
| 6   | updated_at     | datetime    | Yes     |              | CURRENT_TIME | 更新日                          |

---

## 他のページへ

- [README](../README.md)
- [基本設計書](./basic_design_document.md)
- [要件定義書](./requirement_definition_document.md)
- [画面設計書](./screen_design_document.md)
- [テスト仕様書兼報告書](./test_specification_and_report.md)

---

## 更新履歴

| バージョン | 作成/更新日 | 該当箇所                              | 更新内容                                    | 更新者                                    |
| ---------- | ----------- | ------------------------------------- | ------------------------------------------- | ----------------------------------------- |
| 0.01       | 2023/07/02  | データベース定義書作成                | ドラフト                                    | [nekkiChan](https://github.com/nekkiChan) |
| 0.02       | 2023/07/02  | [他ページへ](#他のページへ)           | [他ページへ](#他のページへ)を作成           | [nekkiChan](https://github.com/nekkiChan) |
| 0.03       | 2023/07/03  | [更新履歴](#更新履歴)                 | バージョン0.02の修正                        | [nekkiChan](https://github.com/nekkiChan) |
| 1.00       | 2023/07/16  | [データベース定義](#データベース定義) | [データベース定義](#データベース定義)を作成 | [nekkiChan](https://github.com/nekkiChan) |
