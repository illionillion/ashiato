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
    <link rel="stylesheet" href="/css/signup.css">
    <script src="/js/main.js"></script>
</head>

<body>
    <header>
        <h1 class="title">サインアップ</h1>
        <h1 class="rogo">あしあと</h1>
    </header>
    <main class="container row m-auto">
        <div class="ready">
            <a href="/signin">サインイン</a>
            <p>すでにアカウントをお持ちの方→</p>
        </div>
        <form class="in" action="/api/signup/index.php" method="post">

            <input type="text" name="user-name" class="px-2" placeholder="ユーザーネームを入力">

            <input type="email" name="user-email" class="px-2" placeholder="メールアドレスを入力">

            <input type="password" name="user-password" class="px-2" placeholder="パスワード">

            <input class="go" type="submit" class="px-2" value="送信">
        </form>
        <p class="error">
            <?php
            if (!empty($_GET["error"])) {
                if ($_GET["error"] == 2) {
                    echo "メールアドレスを入力してください";
                } else if ($_GET["error"] == 1) {

                    echo "ユーザーネームを設定してください";
                } else if ($_GET["error"] == 3) {
                    echo "パスワードを設定してください";
                } else if ($_GET["error"] == 4) {
                    echo "同じユーザー名かメールアドレスが登録されています。";
                }
            }
            ?>
        </p>
    </main>
</body>

</html>