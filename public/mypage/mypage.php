<?php
// ログインチェック
session_start();
if(!$_SESSION['login_user']) {
    return header('Location: ./login.php');
}

$login_user = $_SESSION['login_user'];
foreach($login_user as $user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['id'] = $user['id'];
}
vardump($_SESSION['username']);
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
        <button class="btn" type="button" onclick="location.href='./gachaFifth.php">
                DBを利用してがちゃを作成
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaSecond.php'">
                がちゃ②
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaThird.php'">
                がちゃ③
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaFourth.php'">
                がちゃ④
        </button>
    </body>
</html>