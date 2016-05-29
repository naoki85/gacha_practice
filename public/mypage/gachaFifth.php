<?php
require_once '../template/db.php';

$sql = 'SELECT * FROM `gacha` INNER JOIN `item` ON `gacha`.`item_id` = `item`.`id`';
$prepare = $db->prepare($sql);
$prepare->execute();
$gacha_items = $prepare->fetchAll();

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
//var_dump($_SESSION['result']);

$sql_log = 'INSERT INTO `gacha_log` VALUES (null, 3, "aaaaa",null,null)';
$prepare_log = $db->prepare($sql_log);

//$prepare_log->bindValue(':user_id', $_SESSION['user_id']);
//$prepare_log->bindValue(':time', time());
$prepare_log->execute();
/*
$sql_item = 'INSERT INTO `user_item` VALUES(null, :user_id, :item_id, :time, :time)';
$prepare_item = $db->prepare($sql_item);
$prepare_item->bindValue(':user_id', $_SESSION['user_id']);
$prepare_item->bindValue(':item_id', $item_id);
$prepare_item->bindValue(':time', time());
$prepare_item->execute();
*/
header('Location: ./result.php');
exit;

