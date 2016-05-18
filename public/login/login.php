<?php
session_start();
$error_message = $_SESSION['error_flg'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ログイン</title>
        <link rel="stylesheet" href="my_template.css">
    </head>
    <body>
        <h4>ログイン</h4>
        <?php if(isset($error_message)): ?>
            <div>
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="login_done.php" method="post">
            <label for="username" />ユーザーネーム</label><input type="text" name="username" />
            <label for="password" />パスワード</label><input type="password" name="password" /><input type="password" name="password" />
        </form>
    </body>
</html>