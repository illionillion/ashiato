<?php
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインアップ</title>
    <!-- BootStrap -->
    <link rel="shortcut icon" href="/img/ashiato.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/signin.css">
    <script src="/js/main.js"></script>
</head>

<body>
    <header>
        <h1 class="title">サインイン</h1>
        <h1 class="rogo">あしあと</h1>
    </header>
    <main class="container row m-auto">
        <div class="ready">
            <hi>まだアカウントがない方は→<hi>
                    <a href="/signup">サインアップ</a>
        </div>
        <form class="in" action="/api/signin/index.php" method="post">

            <input type="text" name="user-name" placeholder="ユーザーネームを入力">

            <input type="password" name="user-password" placeholder="パスワード">

            <input class="go" type="submit" value="送信">
        </form>
        <p class="error">
            <?php
            if (!empty($_GET["error"])) {
                if ($_GET["error"] == 1) {
                    echo "ユーザーネームを入力してください";
                } else if ($_GET["error"] == 2) {
                    echo "パスワードを入力してください";
                } else if ($_GET["error"] == 3) {
                    echo "存在しないユーザー名です";
                } else if ($_GET["error"] == 4) {
                    echo "パスワードが間違っています";
                }
            }
            ?>
        </p>

    </main>
</body>

</html>