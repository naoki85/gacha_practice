<?php
require_once '../template/db.php';

$sql = 'SELECT * FROM `users` WHERE `id` = :user_id';
$prepare = $db->prepare($sql);
$prepare->bindValue(':user_id', $_SESSION['user_id']);
$prepare->execute();
$users = $prepare->fetchAll();

foreach($users as $user) {
    $updated_at = $user['updated_at'];
}

$sql_cam = 'SELECT * FROM `gacha_campaign` WHERE `start` <= :start_time AND `end` > :end_time';
$prepare_cam = $db->prepare($sql_cam);
$prepare_cam->bindValue(':start_time', $updated_at);
$prepare_cam->bindValue(':end_time', $updated_at);
$prepare_cam->execute();
$gacha_campaign = $prepare_cam->fetchAll();

foreach($gacha_campaign as $campaign) {
    $campaign_id = $campaign['id'];
}

require_once '../template/template_header.php';
?>

<!-- 本体 -->
<?php if($campaign_id == NULL): ?>
    <div>
        ただいま開催中の期間限定がちゃはありません
    </div>
<?php else: ?>
    <div>
        <span>ただいま開催中の期間限定がちゃはこちら</span><br />
        <img src="../images/cam_<?php echo $campaign_id; ?>.jpg" width="400px">
    </div>
    <form action="./gachaLimited.php" method="post">
        <input type="hidden" name="gacha_campaign_id" value="<?php echo $campaign_id; ?>" />
        <input type="submit" value="期間限定がちゃをひく！" />
    </form>
<?php endif; ?>
<button class="btn" onclick="location.href='./mypage.php'">
    マイページへ戻る
</button>

<?php
require_once '../template/template_footer.php';
