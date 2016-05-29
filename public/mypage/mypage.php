<?php
// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>がちゃ</title>
        <link rel="stylesheet" href="../my_template.css">
    </head>
    <body>
        <h4>こんにちは、<?php echo $username . "さん"; ?></h4>
        <button class="btn" type="button" onclick="location.href='./gachaFifth.php'">
                DBを利用してがちゃを作成
        </button>
        <button class="btn" type="button" onclick="location.href='../admin/admin.php'">
                管理画面
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaBox.php'">
                ボックスがちゃ
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaLimited.php'">
                期間限定がちゃ
        </button>
        <button class="btn" type="button" onclick="location.href='../login/logout.php'">
                ログアウト
        </button>
        <button class="btn" type="button" onclick="location.href='../login/logout.php'">
                アンケート
        </button>
        <form action="updated_at.php" ,ethod="post">
            <input type="text" name="user_updated_time" id="" />
        </form>
    </body>
</html>