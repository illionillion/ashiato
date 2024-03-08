<?php
include "../../lib/connect_db.php";

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GETリクエストの場合の処理（直接アクセスされた場合）

    // 別のページにリダイレクト
    header("Location: /");
    exit;
}

$username = $_POST["user-name"];
$password = $_POST["password"];

if (!isset($username) || empty($username)) {
    header("Location: /signin?error=1");
    die("Error: Username is null or empty");
}
if (!isset($password) || empty($password)) {
    header("Location: /signin?error=2");
    die("Error: Password is null or empty");
}

try {
    $pdo = connect_db();
    $stmt = $pdo->prepare("SELECT user_id, user_name, password, email FROM user WHERE user_name = :user_name");

    $stmt->bindParam(':user_name', $username, PDO::PARAM_STR);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) == 0) {
        header("Location: /signin?error=3");
        die("ユーザが見つかりません");
    }

    $hashedPassword = hash("sha256", $password);

    if ($users[0]["password"] == $hashedPassword) {
        $_SESSION['user_id'] = $users[0]["user_id"];
        $_SESSION['user_name'] = $users[0]["user_name"];
        header("Location: /");
        echo "ログイン成功";
    } else {
        header("Location: /signin?error=4");
        echo "ログイン失敗";
    }

} catch (PDOException $e) {
    header("Location: /signin?error=5");
    echo $e->getMessage();
}
