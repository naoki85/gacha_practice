<?php
require_once '../template/db.php';

$_SESSION['result'] = '';

$sql = 'SELECT * FROM `gacha` INNER JOIN `item` ON `gacha`.`item_id` = `item`.`id` WHERE `gacha`.`gacha_campaign_id` = 0';
$prepare = $db->prepare($sql);
$prepare->execute();
$gacha_items = $prepare->fetchAll();

// 以下、がちゃ④と同様の実装
$max = 0;
foreach($gacha_items as $value) {
    $max += $value['ratio'];
}

$point = mt_rand(0, $max - 1);

foreach($gacha_items as $value) {
    $max -= $value['ratio'];
    if($max <= $point) {
        $item_id = $value['item_id'];
        $_SESSION['result'] = $value['item_image'];
        break;
    }
}

$sql_log = 'INSERT INTO `gacha_log` VALUES (null, :user_id, "test", :created_time, :updated_time)';
$prepare_log = $db->prepare($sql_log);
$prepare_log->bindValue(':user_id', $_SESSION['user_id']);
$prepare_log->bindValue(':created_time', date("Y-m-d H:i:s", time()));
$prepare_log->bindValue(':updated_time', date("Y-m-d H:i:s", time()));
$prepare_log->execute();

$sql_item = 'INSERT INTO `user_item` VALUES(null, :user_id, :item_id, :created_time, :updated_time)';
$prepare_item = $db->prepare($sql_item);
$prepare_item->bindValue(':user_id', $_SESSION['user_id']);
$prepare_item->bindValue(':item_id', $item_id);
$prepare_item->bindValue(':created_time', date("Y-m-d H:i:s", time()));
$prepare_item->bindValue(':updated_time', date("Y-m-d H:i:s", time()));
$prepare_item->execute();

header('Location: ./result.php');
exit;

