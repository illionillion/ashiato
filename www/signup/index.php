<?php
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインアップ</title>
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
</head>

<body>
    <main class="container row m-auto">
        <h1>サインアップ</h1>
        <a href="/signin">サインイン</a>
        <form action="/api/signup/index.php" method="post">

            <input type="text" name="user-name" placeholder="ユーザーネームを入力">
            
            <input type="email" name="user-email" placeholder="ユーザーネームを入力">

            <input type="password" name="user-password" placeholder="パスワード">

            <input type="submit" value="送信">
        </form>

    </main>
</body>

</html>