# Gs DEV9 php08（更新/削除）課題

## 使用した技術要素
- XAMPP 5.6.3
- PHP 5.6.3
- Apache 2.4.10
- MySQL 5.6.21
- phpMyAdmin 4.2.11
- Google Books Api

## ディレクトリ構成
  ```
  .
  ├── css/ .. cssフォルダ
    └── style.css .. スタイルシート
  ├── tempaltes/ .. テンプレートフォルダ
    ├── header.php .. ヘッダー
    └── footer.php .. フッター
  ├── config/ .. 設定フォルダ
    └── database.php .. DB情報（環境に合わせて書き換えてください）
  ├── uploads/ .. アップロード画像フォルダ
  ├── vendor/ .. Google Books API利用に関するフォルダ
  ├── index.php .. トップ
  ├── signup.php .. 新規登録
  ├── login.php .. ログイン
  ├── logout.php .. ログアウト
  ├── mypage.php .. マイページ
  ├── search.php .. 検索
  ├── search_result.php .. APIの検索結果を返す
  ├── book_save.php .. 本データを保存する
  ├── single.php .. 本単体ページ
  ├── comment_save.php .. 本のコメントデータを渡す
  ├── profile.php .. ユーザー情報変更
  ├── user.php .. 他ユーザーのユーザー情報
  ├── password.php .. パスワードのハッシュ化補助
  ├── admin.php .. ユーザー管理画面へのログイン
  └── dashboard.php .. ユーザー管理

  ```

## DB構成
- users

| カラム名              　   | 定義                |
|:-------------------------|:-------------------:|
| id                       | int(12), primary key, auto_increment |
| name                     | varchar(20) not null  |
| password                 | varchar(100) not null |
| avatar                   | blob                  |
| administrator            | tinyint(1)            |

- books

| カラム名                  | 定義                |
|:-------------------------|:-------------------:|
| id                       | int(12), primary key, auto_increment |
| uid                      | int(12) not null |
| bid                      | varchar(20) not null |
| title                    | varchar(255) |
| author                   | varchar(255) |
| image                    | varchar(255) |

- comments

| カラム名                  | 定義                |
|:-------------------------|:-------------------:|
| id                       | int(12), primary key, auto_increment |
| uid                      | int(12) not null |
| bid                      | varchar(20) not null |
| title                    | varchar(255) not null |
| comment                  | varchar(1000) not null |
