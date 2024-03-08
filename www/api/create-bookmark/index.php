<?php 

include "../../lib/connect_db.php";
include "../../lib/session_check.php";

session_check();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GETリクエストの場合の処理（直接アクセスされた場合）

    // 別のページにリダイレクト
    header("Location: /create-bookmark");
    exit;
}

$bookmark_name = $_POST["bookmark-name"];
$bookmark_description = $_POST["bookmark-description"];
$user_id = $_SESSION["user_id"];

if (!isset($bookmark_name) || empty($bookmark_name)) {
    header("Location: /create-bookmark?error=1");
    die("Error: bookmark_name is null or empty");
}
if (!isset($bookmark_description) || empty($bookmark_description)) {
    header("Location: /create-bookmark?error=2");
    die("Error: bookmark_description is null or empty");
}

try {
    $pdo = connect_db();
    $stmt = $pdo->prepare("INSERT INTO bookmark (bookmark_name, bookmark_description, user_id) values (:bookmark_name, :bookmark_description, :user_id)");
    $stmt->bindParam(':bookmark_name', $bookmark_name, PDO::PARAM_STR);
    $stmt->bindParam(':bookmark_description', $bookmark_description, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();

    $bookmark_id = $pdo->lastInsertId();

    header("Location: /create-bookmark?success");

} catch (PDOException $e) {
    // header("Location: /create-bookmark?error=5");
    echo $e->getMessage();
}
