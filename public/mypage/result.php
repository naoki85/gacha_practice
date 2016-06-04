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

<!-- 回数特典表示部分 -->
<?php if(isset($_SESSION['special_item_count']) && $_SESSION['special_item_count'] != NULL && isset($_SESSION['special_item']) && $_SESSION['special_item'] != NULL): ?>
    <div>
        <h3>▽<?php echo $_SESSION['special_item_count']; ?>回目の特典です！▽</h3>
        <img src="../images/<?php echo $_SESSION['special_item']; ?>.jpg" width="200px">
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