<?php 

session_start();

// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: /login/login.php');
}

// DB用意
$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));

try {
    // DB接続
    $db = new PDO(sprintf("mysql:dbname=%s;host=%s", substr($cleardb['path'], 1), $cleardb['host']), $cleardb['user'], $cleardb['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $_SESSION['error_flg'] = "データベース接続エラー";
    header('Location: /mypage/mypage.php');
    exit;
}


