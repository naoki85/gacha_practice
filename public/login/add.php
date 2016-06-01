<?php
session_start();
$error_message = $_SESSION['error_flg'];

require_once '../template/template_header.php';
?>

<h4>新規登録</h4>
<?php if(isset($error_message)): ?>
    <div>
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>
<form action="add_done.php" method="post">
    <label for="username" />ユーザーネーム</label><input type="text" name="username" />
    <label for="password" />パスワード</label><input type="password" name="password" />
    <input type="submit" value="登録" />
</form>

<?php require_once '../template/template_footer.php'; ?>