<?php
session_start();

// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

$result = $_SESSION['result'];

require_once '../template/template_header.php';
?>

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

<!-- JavaScript -->
<script>
    // HTML5のHistory APIを利用して「戻る」ボタンを無効化
    history.pushState(null, null, null);

    window.addEventListener("popstate", function() {
        history.pushState(null, null, null);
    });
</script>

<?php require_once '../template/template_footer.php'; ?>