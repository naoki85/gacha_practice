<?php
session_start();

// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

$result = $_SESSION['result'];

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
        <img src="../images/<?php echo $result; ?>.jpg" width="200px">
    </div>

    <?php if(isset($SESSION['special_item'])): ?>
        <div>
            <?php echo $SESSION['special_item']; ?>
            <!-- <img src="../images/<?php //echo $result; ?>.jpg" width="200px"> -->
        </div>
    <?php endif; ?>

    <button class="btn" onclick="location.href='./mypage.php'">
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