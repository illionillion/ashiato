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

// NULLチェック
if (!isset($_POST["user-name"]) || empty($_POST["user-name"])) {
    header("Location: /signup?error=1");
    die("Error: user-name is null or empty");
}
if (!isset($_POST["user-email"]) || empty($_POST["user-email"])) {
    header("Location: /signup?error=2");
    die("Error: user-email is null or empty");
}
if (!isset($_POST["user-password"]) || empty($_POST["user-password"])) {
    header("Location: /signup?error=3");
    die("Error: user-password is null or empty");
}

$userName = $_POST["user-name"];
$userPassowrd = $_POST["user-password"];
$hashedPassword = hash('sha256', $userPassowrd);
$userEmail = $_POST["user-email"];

try {
    $pdo = connect_db();

    // 日記を挿入
    $stmt = $pdo->prepare("INSERT INTO user (user_name, password, email) VALUES (:user_name, :password, :email)");
    $stmt->bindParam(':user_name', $userName, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);
    $stmt->execute();

    $userId = $pdo->lastInsertId();
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_name'] = $userName;
    header("Location: /");

} catch (PDOException $e) {
    header("Location: /signup?error=4");
    echo $e->getMessage();
    exit;
}