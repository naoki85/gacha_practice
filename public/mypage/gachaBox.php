<?php
require_once '../template/db.php';

// ベースはがちゃ⑤と同様
$sql = 'SELECT * FROM `gacha` INNER JOIN `item` ON `gacha`.`item_id` = `item`.`id` WHERE `gacha`.`gacha_campaign_id` = 0';
$prepare = $db->prepare($sql);
$gacha = $prepare->execute();
$gacha_items = $prepare->fetchAll();

$sql_count = 'SELECT count(*) FROM `gacha` INNER JOIN `item` ON `gacha`.`item_id` = `item`.`id` WHERE `gacha`.`gacha_campaign_id` = 0';
$prepare = $db->prepare($sql_count);
$prepare->execute();
$gacha_count = $prepare->fetchColumn();
var_dump($gacha_count);

/*
$i = 0;
while($i < $gacha_count) {
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

    $sql_user_item = 'SELECT * FROM `user_item` WHERE `user_id` = :user_id AND `item_id` = :item_id';
    $prepare_user_item = $db->prepare($sql_user_item);
    $prepare_user_item->bindValue(':user_id', $_SESSION['user_id']);
    $prepare_user_item->bindValue(':item_id', $item_id);
    $exist_user_item = $prepare->execute();

    if(empty($exist_user_item)) {
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

$sql_count_log = 'SELECT count(*) FROM `gacha_log` WHERE `user_id` = :user_id';
$prepare_count_log = $db->prepare($sql_count_log);
$prepare_count_log->bindValue(':user_id', $_SESSION['user_id']);
$gacha_log_count = $prepare_count_log->execute();
*/
var_dump($gacha_count);
//var_dump($gacha_log_count);
/*
switch ($gacha_log_count) {
    case 3:
        echo "iは0に等しい";
        break;
    case 6:
        echo "iは1に等しい";
        break;
    case 10:
        echo "iは2に等しい";
        break;
}
*/
//header('Location: ./result.php');
//exit;


