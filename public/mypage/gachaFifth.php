<?php

session_start();

// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

$cleardb = parse_url(getenv('CLEARDB_DATABASE_URL'));

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $db = new PDO(sprintf("mysql:dbname=%s;host=%s", substr($cleardb['path'], 1), $cleardb['host']), $cleardb['user'], $cleardb['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM `gacha` INNER JOIN `item` ON `gacha`.`item_id` = `item`.`id`';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $gacha_items = $prepare->fetchAll();

} catch (PDOException $e) {
    $_SESSION['error_flg'] = "データベース接続エラー";
    header('Location: ../mypage/mypage.php');
    exit;
}

// 以下、がちゃ④と同様の実装
$max = 0;
foreach($gacha_items as $value) {
    $max += $value['rate'];
}

$point = mt_rand(0, $max - 1);

foreach($gacha_items as $value) {
    $max -= $value['rate'];
    if($max <= $point) {
        $item_id = $value['item_id'];
        $_SESSION['result'] = $value['item_image'];
        break;
    }
}

try {
    $sql_log = 'INSERT INTO `gacha_log` VALUES (null, :user_id, :time, :time, :time)';
    $prepare_log = $db->prepare($sql_log);
    $prepare_log->bindValue(':user_id', $_SESSION['user_id']);
    $prepare_log->bindValue(':time', time());
    $prepare_log->execute();

    $sql_item = 'INSERT INTO `user_item` VALUES(null, :user_id, :item_id, :time, :time)';
    $prepare_item = $db->prepare($sql_item);
    $prepare_item->bindValue(':user_id', $_SESSION['user_id']);
    $prepare_item->bindValue(':item_id', $item_id);
    $prepare_item->bindValue(':time', time());
    $prepare_item->execute();

} catch (PDOException $e) {
    $_SESSION['error_flg'] = "データベース接続エラー②";
    header('Location: ./mypage.php');
    exit;
}

header('Location: ./result.php');
exit;
