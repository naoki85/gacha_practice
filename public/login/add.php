<?php
session_start();
$error_message = $_SESSION['error_flg'];

require_once '../template/template_header.php';
?>

<h4>新規登録</h4>
<?php if(isset($error_message)): ?>
    <div>
        <span style="color:#ff0000;"><?php echo $error_message; ?></span>
    </div>
<?php endif; ?>
<h4>ユーザーネーム、パスワードは半角英数字で入力してください。</h4>
<form action="add_done.php" method="post">
    <label for="username" />ユーザーネーム</label><input type="text" name="username" required />
    <label for="password" />パスワード</label><input type="password" name="password" required />
    <input type="submit" value="登録" class="btn" />
</form>

<?php require_once '../template/template_footer.php'; ?>