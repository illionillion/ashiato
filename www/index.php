<?php
include "./lib/session_check.php";
include "./lib/connect_db.php";
include "./components/carousel/index.php";
include "./components/header/index.php";
include "./components/footer/index.php";

session_check();

// ここにSQLかく
try {
    $pdo = connect_db();
    // bookmark取得
    $bookmarkQuery = $pdo->prepare("SELECT 
    b.bookmark_id,
    b.bookmark_name,
    b.bookmark_description,
    b.user_id,
    b.created_at,
    u.user_name
    FROM bookmark b JOIN user u ON b.user_id = u.user_id");
    // クエリを実行
    $bookmarkQuery->execute();
    $bookmarkResult = $bookmarkQuery->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>あしあと</title>
    <!-- BootStrap -->
<link rel="shortcut icon" href="/img/ashiato.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <script src="/js/main.js"></script>
</head>

<body>
    <main class="row">
        <?php
        $header = new Header();
        $header->render();
        ?>
        <!--テンプレート-->
        <?php foreach ($bookmarkResult as $key => $value): ?>
            <div class="asiatotenp">
                <a href="/bookmark/?id=<?= $value["bookmark_id"] ?>" class="contents_heading w-100 h-100">
                    <?php
                    $carousel = new Carousel($value["bookmark_id"]);
                    $carousel->render();
                    ?>
                    <h2 class="asiatoname">
                        <?= $value["bookmark_name"] ?>
                    </h2>
                    <p class="name">投稿者：
                        <?= $value["user_name"] ?>
                    </p>
                    <p class="asiato-desc">概要：
                        <?= $value["bookmark_description"] ?>
                    </p>
                </a>
            </div>
        <?php endforeach; ?>
        <!--下のボタン-->
        <?php
        $header = new Footer();
        $header->render();
        ?>

    </main>
</body>

</html>