<?php
require_once '../template/db.php';

$sql = 'SELECT * FROM `gacha` LEFT JOIN `gacha_campaign` ON `gacha`.`gacha_campaign_id` = `gacha_campaign`.`id` INNER JOIN `item` ON `gacha`.`item_id` = `item`.`id`';
$prepare = $db->prepare($sql);
$prepare->execute();
$gacha = $prepare->fetchAll();

require_once '../template/template_header.php';
?>

<!-- 本体 -->
<div style="text-align:right;">
    <a href="/admin/admin.php">管理画面トップ</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Campaign</th>
            <th>Item</th>
            <th>Ratio</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($gacha as $value): ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td>
                    <?php if($value['campaign_name'] == NULL): ?>
                        通常がちゃ
                    <?php else: ?>
                        <?php echo $value['campaign_name']; ?>
                    <?php endif; ?>
                </td>
                <td><?php echo $value['item_name']; ?></td>
                <td><?php echo $value['ratio']; ?></td>
                <td>編集、削除機能など</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once '../template/template_footer.php';