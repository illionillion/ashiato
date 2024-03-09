<?php
include "./lib/session_check.php";
include "./lib/connect_db.php";

session_check();

// ここにSQLかく
try {
    $pdo = connect_db();
    $stmt0 = $pdo->prepare("SELECT * FROM user");
    $stmt = $pdo->prepare("SELECT * FROM bookmark");
    $stmt1 = $pdo->prepare("SELECT * FROM bookmark_content_image");


    // $stmt->bindParam(':user_name', $username, PDO::PARAM_STR);
    $stmt0->execute();
    $users = $stmt0->fetchAll((PDO::FETCH_ASSOC));
    $stmt->execute();
    $bookmarks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt1->execute();
    $bookmarksContents = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    if (count($bookmarks) == 0) {
        // header("Location: /?error=3");
        echo "ブックマークが見つかりません";
    }
    // if (count($bookmarksContents) == 0) {
    //     // header("Location:/?error4");
    //     echo "ブックマークコンテンツが見つかりません";
    // }
    // var_dump($users);
    // var_dump($bookmarks);
    $userMap = [];
    foreach($users as $uservalue){
        $userMap[$uservalue["user_id"]] = $uservalue["user_name"];
    }
    // var_dump($userMap);
    // var_dump($bookmarksContents);

} catch (PDOException $e) {
    header("Location: /signin?error=5");
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
        <header>
            <!--検索ボックス-->
            <div class="container-fluid">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="searchgo btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <!--選択ボタン-->
            <div class="like-or-oll">
                <button type="button" class="btn btn-primary btn-lg">
                    Large button
                </button>
                <button type="button" class="btn btn-primary btn-lg">
                    Large button
                </button>
            </div>
        </header>
        <!--テンプレート-->
        <?php foreach($bookmarks as $key => $value): ?>
        <div class="asiatotenp">
            <p class="name"><?=$userMap[$value["user_id"]]?></p>
            <div class="picture"><?=$bookmarksContents[$key]["bookmark_content_image_path"]?></div>
            <p class="asiatoname"><?=$value["bookmark_name"]?></p>
            <div class="goodcount">
                <div id="pre"><?=$value["bookmark_id"]?></div>
                <input class="gootbutton" type="button" id="plus" value="+" />
            </div>
        </div>
        <?php endforeach;?>

        <div class="asiatotenp">
            <p class="name">ユーザーネーム</p>
            <div class="picture">写真</div>
            <p class="asiatoname">題名</p>
            <div class="goodcount">
                <div id="pre">0</div>
                <input class="gootbutton" type="button" id="plus" value="+" />
            </div>
        </div>
        <!--下のボタン-->
        <footer>
            <div class="nuderbotton">
                <button type="button" class="btn btn-primary btn-lg">
                    Large button
                </button>
                <button type="button" class="btn btn-primary btn-lg">
                    Large button
                </button>
                <button type="button" class="btn btn-primary btn-lg">
                    Large button
                </button>
            </div>
        </footer>

    </main>
</body>

</html>