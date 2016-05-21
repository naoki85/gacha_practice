<?php

session_start();

// ログインチェック
session_start();
if(!$_SESSION['login_user_id']) {
    return header('Location: ./login.php');
}

$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $db = new PDO(sprintf("mysql:dbname=%s;host=%s", substr($cleardb['path'], 1), $cleardb['host']), $cleardb['user'], $cleardb['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM `item` LEFT JOIN `gacha` ON `item`.`id` = `gacha`.`item_id`';
    $prepare = $db->prepare($sql);
    $gacha_items = $prepare->execute();

    


} catch (PDOException $e) {
    $_SESSION['error_flg'] = "データベース接続エラー";
    header('Location: ./add.php');
    exit;
}