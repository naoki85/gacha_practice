<?php

$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));

if(empty($cleardb)) {
    session_start();
    $_SESSION['error_flg'] = "ClearDBから値を取得できていない";
    header('Location: ./add.php');
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $db = new PDO(sprintf("mysql:dbname=%s;host=%s", substr($cleardb['path'], 1), $cleardb['host']), $cleardb['user'], $cleardb['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO `users` VALUES (null, :username, :password, :now_time, :now_time)';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':username', $username, PDO::PARAM_STR);
    $prepare->bindValue(':password', $password, PDO::PARAM_STR);
    $prepare->bindValue(':now_time', NOW(), PDO::PARAM_INT);
    $prepare->execute();
    header('Location: ./login.php');
    exit;
} catch (PDOException $e) {
    session_start();
    $_SESSION['error_flg'] = $e->getMessage();
    header('Location: ./add.php');
    exit;
}

