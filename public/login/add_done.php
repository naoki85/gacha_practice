<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$pass = $url["pass"];
$db = substr($url["path"], 1);

$dsn = new mysqli($server, $username, $pass, $db);

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $db = new PDO($server, $username, $pass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO `users` VALUES (null, :username, :password, :now_time, :now_time)';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':username', $username, PDO::PARAM_STR);
    $prepare->bindValue(':password', $password, PDO::PARAM_STR);
    $prepare->bindValue(':now_time', time(),    PDO::PARAM_INT);
    $prepare->execute();
    header('Location: ./login.php');
    exit;
} catch (PDOException $e) {
    session_start();
    $_SESSION['error_flg'] = "データベース接続エラー";
    header('Location: ./add.php');
    exit;
}

