<?php

session_start();

$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $db = new PDO($dsn, $db['user'], $db['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT `id` FROM `users` WHERE `username` = :username AND `password` = :password';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':username', $username, PDO::PARAM_STR);
    $prepare->bindValue(':password', $password, PDO::PARAM_STR);
    $login_user_id = $prepare->execute();
} catch (PDOException $e) {
    $_SESSION['error_flg'] = "データベース接続エラー";
    header('Location: ./add.php');
    exit;
}

if(isset($login_user)) {
    $_SESSION['login_user_id'] = $login_user_id;
    header('Location: ./mypage.php');
    exit;
} else {
    $_SESSION['error_flg'] = "名前かパスワードが間違っています。";
    header('Location: ../mypage/mypage.php');
    exit;
}