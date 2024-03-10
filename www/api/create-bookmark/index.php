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

if (!isset($_POST["bookmark-name"]) || empty($_POST["bookmark-name"])) {
    header("Location: /create-bookmark?error=1");
    die("Error: bookmark_name is null or empty");
}
if (!isset($_POST["bookmark-description"]) || empty($_POST["bookmark-description"])) {
    header("Location: /create-bookmark?error=2");
    die("Error: bookmark_description is null or empty");
}

if (!isset($_POST["bookmark_content"]) || empty($_POST["bookmark_content"]) || !is_array($_POST["bookmark_content"])) {
    header("Location: /create-bookmark?error=3");
    die("Error: bookmark_content is null or empty");
}

$bookmark_name = $_POST["bookmark-name"];
$bookmark_description = $_POST["bookmark-description"];
$bookmark_content = $_POST["bookmark_content"];
$user_id = $_SESSION["user_id"];

try {
    $pdo = connect_db();
    $stmt = $pdo->prepare("INSERT INTO bookmark (bookmark_name, bookmark_description, user_id) values (:bookmark_name, :bookmark_description, :user_id)");
    $stmt->bindParam(':bookmark_name', $bookmark_name, PDO::PARAM_STR);
    $stmt->bindParam(':bookmark_description', $bookmark_description, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();

    $bookmark_id = $pdo->lastInsertId();
    
    // bookmark_content追加
    foreach ($bookmark_content as $key => $value) {
        // 配列内の各要素を処理する
        if (is_array($value)) {

            // ネストされた配列の場合
            $stmt = $pdo->prepare("INSERT INTO bookmark_content (
            bookmark_content_name,
            bookmark_content_address,
            bookmark_content_comment,
            bookmark_content_price,
            stay_time_h,
            stay_time_m,
            used_money,
            move_time_h,
            move_time_m,
            how_move,
            bookmark_content_image_path,
            bookmark_id, bookmark_instagram_url
            ) VALUES (
            :bookmark_content_name,
            :bookmark_content_address,
            :bookmark_content_comment,
            :bookmark_content_price,
            :stay_time_h,
            :stay_time_m,
            :used_money,
            :move_time_h,
            :move_time_m,
            :how_move,
            :bookmark_content_image_path,
            :bookmark_id,
            '-')");
            $stmt->bindParam(':bookmark_content_name', $value["place-name"], PDO::PARAM_STR);
            $stmt->bindParam(':bookmark_content_address', $value["place-address"], PDO::PARAM_STR);
            $stmt->bindParam(':bookmark_content_comment', $value["place-comment"], PDO::PARAM_STR);
            $stmt->bindParam(':bookmark_content_price', $value["expenses"], PDO::PARAM_INT);
            $stmt->bindParam(':stay_time_h', $value["stay-time-h"], PDO::PARAM_INT);
            $stmt->bindParam(':stay_time_m', $value["stay-time-m"], PDO::PARAM_INT);
            $stmt->bindParam(':used_money', $value["used-money"], PDO::PARAM_INT);
            $stmt->bindParam(':move_time_h', $value["move-time-h"], PDO::PARAM_INT);
            $stmt->bindParam(':move_time_m', $value["move-time-m"], PDO::PARAM_INT);
            $stmt->bindParam(':how_move', $value["how-move"], PDO::PARAM_INT);
            $stmt->bindParam(':bookmark_content_image_path', $value["image-input"], PDO::PARAM_STR);
            $stmt->bindParam(':bookmark_id', $bookmark_id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    header("Location: /create-bookmark?success");

} catch (PDOException $e) {
    header("Location: /create-bookmark?error=5");
    echo $e->getMessage();
}
