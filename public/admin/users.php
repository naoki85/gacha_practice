<?php
require_once '../template/db.php';

$sql = 'SELECT * FROM `users`';
$prepare = $db->prepare($sql);
$prepare->execute();
$users = $prepare->fetchAll();

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
            <th>username</th>
            <th>password</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo $user['created_at']; ?></td>
            <td><?php echo $user['updated_at']; ?></td>
            <td>編集、削除機能など</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once '../template/template_footer.php';
