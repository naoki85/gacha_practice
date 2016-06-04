<?php 

session_start();

// ログインチェック
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

require_once '../template/db.php';
require_once '../template/template_header.php';

?>

<!-- <link rel="stylesheet" type="text/css" href="../template/bootstrap.css" /> -->

<h1>Welcome!</h1>
<h3><a href="/admin/users.php">ユーザー一覧</a></h3>
<h3><a href="/admin/item.php">アイテム一覧</a></h3>
<h3><a href="/admin/gacha.php">がちゃ一覧</a></h3>

<?php 
require_once '../template/template_footer.php';
?>