<?php
require_once '../template/db.php';

$sql = 'SELECT * FROM `item`';
$prepare = $db->prepare($sql);
$prepare->execute();
$item = $prepare->fetchAll();

require_once '../template/template_header.php';
?>

<!-- <link rel="stylesheet" type="text/css" href="../template/bootstrap.css" /> -->

<!-- 本体 -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>item_name</th>
            <th>Image</th>
            <th>Memo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($item as $value): ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['item_name']; ?></td>
            <td><img src="../images/<?php echo $value['item_image']; ?>.jpg" width="100px"></td>
            <td><?php echo $value['memo']; ?></td>
            <td>編集、削除機能など</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once '../template/template_footer.php';