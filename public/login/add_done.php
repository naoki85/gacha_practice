<?php
session_start();
$_SESSION['error_flg'] = '';

$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));

$username = $_POST['username'];
$password = $_POST['password'];

if(preg_match("/^[a-zA-Z0-9]+$/", $username) == FALSE || preg_match("/^[a-zA-Z0-9]+$/", $password) == FALSE) {
    $_SESSION['error_flg'] = "ユーザーネーム、パスワードは半角英数字で入力してください。";
    header('Location: ./add.php');
    exit;
}

try {
    $db = new PDO(sprintf("mysql:dbname=%s;host=%s", substr($cleardb['path'], 1), $cleardb['host']), $cleardb['user'], $cleardb['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT count(*) FROM `users` WHERE `username` = :username AND `password` = :password';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':username', $username);
    $prepare->bindValue(':password', $password);
    $prepare->execute();
    $exist_user = $prepare->fetchColumn();

    if($exist_user > 0) {
        $_SESSION['error_flg'] = "すでに同じユーザーネーム、パスワードのユーザーが存在します。";
        header('Location: ./add.php');
        exit;
    }

    $sql = 'INSERT INTO `users` VALUES (null, :username, :password, :created_time, :updated_time)';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':username', $username);
    $prepare->bindValue(':password', $password);
    $prepare->bindValue(':created_time', date("Y-m-d H:i:s", time()));
    $prepare->bindValue(':updated_time', date("Y-m-d H:i:s", time()));
    $prepare->execute();
    $_SESSION['error_flg'] = "新規登録が完了しました！";
    header('Location: ./login.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['error_flg'] = $e->getMessage();
    header('Location: ./add.php');
    exit;
}

