<?php
include "./lib/session_check.php";
include "./lib/connect_db.php";
include "./components/carousel/index.php";
include "./components/header/index.php";

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
    FROM bookmark b JOIN user u ON b.user_id = u.user_id ORDER BY b.bookmark_id");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/okamoto.css" />
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
        <footer>
            <div class="nuderbotton">
                <a href="/create-bookmark" class="ub btn btn-primary btn-lg">
                    Write
                    <img src="/img/pen.png" alt="Logo" style="width: 40px; height: 40px; object-fit: contain;">

                </a>
                <button type="button" class="ub btn btn-primary btn-lg">
                    My page
                    <img src="/img/goal.png" alt="Logo" style="width: 40px; height: 40px; object-fit: contain;">

                </button>
            </div>
        </footer>

    </main>
</body>

</html>