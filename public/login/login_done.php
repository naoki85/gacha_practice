<?php

session_start();

$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $db = new PDO(sprintf("mysql:dbname=%s;host=%s", substr($cleardb['path'], 1), $cleardb['host']), $cleardb['user'], $cleardb['pass']);
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

if(isset($login_user_id)) {
    $_SESSION['login_user_id'] = $login_user_id;
    header('Location: ../mypage/mypage.php');
    exit;
} else {
    $_SESSION['error_flg'] = "名前かパスワードが間違っています。";
    header('Location: ./login.php');
    exit;
}