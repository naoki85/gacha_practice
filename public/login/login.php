<?php
session_start();
$error_message = $_SESSION['error_flg'];

require_once '../template/template_header.php';
?>

<h4>ログイン</h4>
<?php if(isset($error_message)): ?>
    <div>
        <span style="color:#ff0000;"><?php echo $error_message; ?></span>
    </div>
<?php endif; ?>
<form action="login_done.php" method="post">
    <label for="username" />ユーザーネーム</label><input type="text" name="username" required />
    <label for="password" />パスワード</label><input type="password" name="password" required />
    <input type="submit" value="ログイン" class="btn" />
</form>

<?php require_once '../template/template_footer.php'; ?>