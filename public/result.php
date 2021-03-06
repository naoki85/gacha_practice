<?php
session_start();
// 結果を変数に格納
if($_SESSION['array_flg'] == 1) {
    foreach($_SESSION['result'] as $value) {
        $result = $value;
    }
} else {
    $result = $_SESSION['result'];
}

// 別で渡しているリストを変数に格納
if(isset($_SESSION['list'])) {
    $total_count = 0;
    foreach($_SESSION['list'] as $value) {
        $total_count += $value['rate'];
    }
}

require_once './template/template_header.php';
?>

<h4>結果</h4>
<div>
    <img src="./images/<?php echo $result; ?>.jpg" width="200px">
</div>
<?php if(isset($total_count)): ?>
    <h4>確率</h4>
    <div>
        <table>
            <?php foreach($_SESSION['list'] as $value): ?>
            <?php 
                $rate = ($value['rate'] / $total_count) * 100;
            ?>
            <tr>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo ($rate . " %"); ?></td>
            </tr>
            <? endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<!-- JavaScript -->
<script>
    // HTML5のHistory APIを利用して「戻る」ボタンを無効化
    history.pushState(null, null, null);

    window.addEventListener("popstate", function() {
        history.pushState(null, null, null);
    });
</script>

<?php require_once './template/template_footer.php'; ?>