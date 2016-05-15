<?php
session_start();
if($_SESSION['array_flg'] == 1) {
    foreach($_SESSION['result'] as $value) {
        $result = $value;
    }
} else {
    $result = $_SESSION['result'];
}

if(isset($_SESSION['list'])) {
    $total_count = 0;
    foreach($_SESSION['list'] as $value) {
        $total_count += $value['rate'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>がちゃ</title>
    <link rel="stylesheet" href="my_template.css">
</head>
<body>
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
    <button class="btn" onclick="location.href='./index.php'">
        インデックスへ戻る
    </button>

    <!-- JavaScript -->
    <script>
        // HTML5のHistory APIを利用して「戻る」ボタンを無効化
        history.pushState(null, null, null);

        window.addEventListener("popstate", function() {
            history.pushState(null, null, null);
        });
    </script>
</body>
</html>