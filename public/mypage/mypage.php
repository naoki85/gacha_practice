<?php
// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

$username = $_SESSION['username'];

if(isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $_SESSION['msg'] = '';
}

require_once '../template/template_header.php';
?>

<link rel="stylesheet" type="text/css" href="../template/datetimepicker-master/jquery.datetimepicker.css" />

<h4>こんにちは、<?php echo $username . "さん"; ?></h4>
<?php if(isset($msg)): ?>
    <span style="color:#ff0000;"><?php echo $msg; ?></span><br />
<?php endif; ?>
<button class="btn" type="button" onclick="location.href='./gachaFifth.php'">
        DBを利用してがちゃを作成
</button><br />
<button class="btn" type="button" onclick="location.href='../admin/admin.php'">
        管理画面
</button><br />
<button class="btn" type="button" onclick="location.href='./gachaBox.php'">
        ボックスがちゃ
</button><br />
<button class="btn" type="button" onclick="location.href='./gacha_campaign.php'">
        期間限定がちゃ
</button><br />
<button class="btn" type="button" onclick="location.href='../login/logout.php'">
        ログアウト
</button><br />
<button class="btn" type="button" onclick="location.href='./survey.php'">
        アンケート
</button><br />
<div style="margin-top:10px;">
    <h3>ユーザー時刻を変更する</h3>
    <form action="updated_at.php" method="post">
        <input type="text" name="user_updated_time" id="datetimepicker" />
        <input type="submit" value="登録する" class="btn" />
    </form>
</div>

<!-- JQuery datetimepicker -->
<script src="../template/datetimepicker-master/jquery.js"></script>
<script src="../template/datetimepicker-master//build/jquery.datetimepicker.full.min.js"></script>
<script>
$(function() {
    $('#datetimepicker').datetimepicker({
        format: 'Y-m-d H:i',
        lang: 'ja'
    });
});
</script>

<?php require_once '../template/template_footer.php'; ?>