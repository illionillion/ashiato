<?php
include "../lib/session_check.php";
include "../lib/connect_db.php";
include "../components/cards/index.php";

session_check();

// id パラメータがセットされているか、かつ空でないかを確認する
if (isset($_GET["id"]) && $_GET["id"] !== "") {
    // id パラメータの値を安全に取得
    $id = $_GET["id"];

    // ここにSQLかく
    try {
        $pdo = connect_db();
        // IDを元に投稿データを取得
        // bookmark取得
        $bookmarkQuery = $pdo->prepare("SELECT 
        b.bookmark_id,
        b.bookmark_name,
        b.bookmark_description,
        b.user_id,
        b.created_at,
        u.user_name
        FROM bookmark b JOIN user u ON b.user_id = u.user_id WHERE b.bookmark_id = :bookmark_id");
        // クエリを実行
        $bookmarkQuery->bindParam(':bookmark_id', $id, PDO::PARAM_STR);
        $bookmarkQuery->execute();
        $bookmarkResult = $bookmarkQuery->fetchAll(PDO::FETCH_ASSOC);
        $currentBookmark = $bookmarkResult[0];
        if (count($bookmarkResult) == 0) {
            echo "しおりが見つかりませんでした";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    // id パラメータがセットされていないか、空だった場合の処理
    // echo "ID が指定されていません。";
}


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>しおり</title>
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bookmark.css" />
    <link rel="stylesheet" href="/css/okamotobookmark.css" />
    <script src="/js/main.js"></script>
    <script src="/js/okamoto.js"></script>
</head>

<body>
    <main class="w-100 row m-auto">
        <h1 class="text-center text-dark">
            <?= $currentBookmark["bookmark_name"] ?>
        </h1>
        <!-- <p class="hashtag text-center text-black">ハッシュタグ</p> -->
        <?php
        $cards = new Cards($currentBookmark["bookmark_id"]);
        $cards->render();
        ?>
    </main>
</body>

</html>