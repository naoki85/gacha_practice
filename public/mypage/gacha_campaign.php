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

$sql_cam = 'SELECT * FROM `gacha_campaign` WHERE `start` < :updated_at';
$prepare_cam = $db->prepare($sql_cam);
$prepare_cam->bindValue(':updated_at', $updated_at);
$prepare->execute();
$gacha_campaign = $prepare->fetchAll();

foreach($gacha_campaign as $campain) {
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
        <?php echo "cam_" . $campaign_id . ".jpg"; ?>
    </div>

<?php
require_once '../template/template_footer.php';
