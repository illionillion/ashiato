<?php
include "./lib/session_check.php";
include "./lib/connect_db.php";
include "./components/carousel/index.php";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/okamoto.css" />
    <script src="/js/main.js"></script>
</head>

<body>
    <main class="row">
        <header class="py-2">
            <!--写真-->
            <img src="/img/ashiato.png" alt="Logo" style="width: 100px; height: 100px; object-fit: contain;">
            <!--検索ボックス-->

            </div>
            <div class="container-fluid">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <!-- <button class="searchgo btn btn-outline-success" type="submit"> -->
                    <button class="searchgo btn btn-outline-success" type="button">
                        <img src="/img/search.png" alt="" class="search">
                    </button>
                </form>
            </div>

            <!-- 選択ボタン -->
            <div class="d-flex justify-content-center align-items-center gap-5">
                <?= $_SESSION["user_name"] ?>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-5">
                <a href="/api/signout" class="logout">ログアウト</a>
            </div>
            </div>


        </header>
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
                <!-- <button type="button" class="btn btn-primary btn-lg">
                    
                </button> -->
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