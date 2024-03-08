<?php
    include "../../lib/connect_db.php";
    $username = $_POST["user-name"];
    $password = $_POST["password"];



    if (!isset($username) || empty($username)) {
        //header("Location: /?error=1");
        die("Error: Username is null or empty");
    }
    if (!isset($password) || empty($password)) {
        //header("Location: /?error=1");
        die("Error: Password is null or empty");
    }

    echo "ユーザ名" . $username;
    echo "パスワード" . $password;

    try {
        //code...
        $pdo = connect_db();
        $stmt = $pdo -> prepare("SELECT * FROM user WHERE user_name = :user_name");

        $stmt -> bindParam(':user_name',$username, PDO::PARAM_STR);
        $stmt -> execute();
        $users = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        var_dump($users);

        if(count($users)==0){
            die("ユーザが見つかりません");
        }

        $hashedPassword = hash("sha256",$password);
        echo $hashedPassword;

        if ($users[0]["password"] == $hashedPassword) {
            echo "ログイン成功";
            # code...
        }else{
            echo "ログイン失敗";
        }


        // $users
    } catch (PDOException $e) {
        //throw $th;
    }

?>