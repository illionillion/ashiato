<?php

function connect_db()
{
    $host = getenv("MYSQL_HOST");
    $dbname = getenv('MYSQL_DATABASE'); // データベース名
    $username = getenv('MYSQL_USER'); // ユーザー名
    $password = getenv('MYSQL_PASSWORD'); // パスワード
    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        // PDOオブジェクトを作成し、データベースに接続する
        $pdo = new PDO($dsn, $username, $password, $options);

        // 接続成功時の処理
        // echo "データベースに接続しました。";

        return $pdo;
    } catch (PDOException $e) {
        // 接続失敗時の処理
        die("データベース接続エラー: " . $e->getMessage());
        // return NULL;
    }
}