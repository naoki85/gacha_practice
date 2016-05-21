<?php
// ログインチェック
session_start();
if(!$_SESSION['login_user_id']) {
    return header('Location: ./login.php');
}

$username = $_SESSION['login_user_id'];
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
        <button class="btn" type="button" onclick="location.href='./login/add.php'">
                新規登録してログインする
        </button>
        <div id="result1">
            <img src="./images/<?php echo $result; ?>.jpg" width="200px">
        </div>

        <!-- JavaScript -->
        <script>
            function show() {
                document.getElementById("result1").style.display="block";
            }
        </script>
    </body>
</html>