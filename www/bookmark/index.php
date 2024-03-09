<?php
include "../lib/session_check.php";
include "../lib/connect_db.php";

session_check();

// id パラメータがセットされているか、かつ空でないかを確認する
if (isset($_GET["id"]) && $_GET["id"] !== "") {
    // id パラメータの値を安全に取得
    $id = $_GET["id"];
    echo "ID: " . $id;

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
        
        if (count($bookmarkResult) == 0) {
            echo "しおりが見つかりませんでした";
        }

        var_dump($bookmarkResult);

        // $pdo = connect_db();
        // $stmt0 = $pdo->prepare("SELECT * FROM user");
        // $stmt = $pdo->prepare("SELECT * FROM bookmark WHERE bookmark_id = ?");

        // // $stmt->bindParam(':user_name', $username, PDO::PARAM_STR);
        // $stmt0->execute();
        // $users = $stmt0->fetchAll((PDO::FETCH_ASSOC));
        // $stmt->execute([$id]);
        // $bookmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $bookmarksId = $bookmarks[0]["bookmark_id"];

        // $stmt1 = $pdo->prepare("SELECT * FROM bookmark_content WHERE bookmark_id = ?");

        // $stmt1->execute([$bookmarksId]);
        // $bookmarksContents = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        // // var_dump($bookmarksContents);

        // $bookmarksContentsId = $bookmarksContents[0]["bookmark_content_id"];


        // $stmt2 = $pdo->prepare("SELECT * FROM bookmark_content_image WHERE bookmark_content_id = ?");
        // $stmt2->execute([$bookmarksContentsId]);
        // $bookmarksImage = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        // if (count($bookmarks) == 0) {
        //     // header("Location: /?error=3");
        //     echo "ブックマークが見つかりません";
        // }
        // // if (count($bookmarksContents) == 0) {
        // //     // header("Location:/?error4");
        // //     echo "ブックマークコンテンツが見つかりません";
        // // }
        // // var_dump($users);
        // // var_dump($bookmarks);
        // $userMap = [];
        // foreach($users as $uservalue){
        //     $userMap[$uservalue["user_id"]] = $uservalue["user_name"];
        // }
        // // var_dump($userMap);
        // // var_dump($bookmarksContents);
        // // echo $bookmarks["bookmark_id"];
        // if ($bookmarks[0]["bookmark_id"] != $id) {
        //     echo "記事がありません";
        // }

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/okamoto.css" />
    <script src="/js/main.js"></script>
    <script src="/js/okamoto.js"></script>
</head>

<body>
    <main class="container row m-auto">
        <h1>ユーザー名: <?= $_SESSION["user_name"] ?></h1>
        <a href="/api/signout">サインアウト</a>

        <!--テンプレート-->
        <?php foreach ($bookmarks as $key => $value) : ?>
            <div class="asiatotenp">
                <p><?= $value["bookmark_name"] ?></p>
                <p><?= $value["bookmark_description"] ?></p>

                <p>あしあと</p>

                <?php foreach ($bookmarksContents as $bookmarksvalue) : ?>
                    <p><?= $bookmarksvalue["bookmark_content_name"] ?></p>
                    <?php foreach ($bookmarksImage as $bookmarksImageValue) : ?>
                        <div><?= $bookmarksImageValue["bookmark_content_image_path"] ?></div>
                    <?php endforeach; ?>
                    <p><?= $bookmarksvalue["bookmark_content_address"] ?></p>
                    <p><?= $bookmarksvalue["bookmark_content_comment"] ?></p>
                    <p><?= $bookmarksvalue["bookmark_content_price"] ?></p>
                    <p><?= $bookmarksvalue["bookmark_instagram_url"] ?></p>



                <?php endforeach; ?>


            </div>
        <?php endforeach; ?>

        <!--下のボタン-->

    </main>
</body>

</html>