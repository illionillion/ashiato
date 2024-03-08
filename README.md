# あしあと

## 概要

## 環境構築

`.env`ファイルに以下を記述

```env
MYSQL_DATABASE=my_db
MYSQL_PORT=3306
ADMIN_PORT=3307
PHP_PORT=9090
```

ターミナルを起動して以下を実行（初回は「`--build`もつける」）

```bash
docker compose up -d --build
```

`http://localhost:9090`でWebサーバーにアクセス

`http://localhost:3307`でphpMyAdminにアクセス


- サーバー：`db`
- ユーザー名：`root`
- パスワード：`password`

でログインできる。

起動直後はログインできないので、少し待つ。

コンテナを終了する際は以下を実行

```bash
docker compose down
```

## ディレクトリの説明

- `/config`
  - PHP・Apache・MySQLの設定ファイルを保存するフォルダ
  - 基本触らない
- `/initdb.d`
  - コンテナ起動時にデーターベース内で実行するSQLファイルを保存するフォルダ
  - バックエンドする人以外は基本触らない
- `/www`
  - PHP・HTMLなどアプリのプログラムを保存するフォルダ
  - 機能や画面ごとにフォルダ分けしていく
  - 主なフォルダ
    - `/css`
      - CSSファイルを保存する
    - `/js`
      - JSファイルを保存する
    - `/api`
      - フォームの送信先の処理をするPHPを保存する
    - `/components`
      - PHPのテンプレートで使い回しできる部分をコンポーネント化したものを保存する
  - `/機能名/index.php`のように命名する