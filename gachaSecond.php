<?php
session_start();

// すでにセッションに値が格納されていればリダイレクト
if(isset($_SESSION['result'])) {
    return header('Location: http:index.php');
}

// 配列に値を格納
$list = array(
    'blueEyesWhiteDragon',
    'redEyesBlackDragon',
    'gyaraxyEyesFotonDragon',
    'oddEyesPendulumDragon'
);

// 配列を混ぜる
shuffle($list);

// 配列の先頭1件を取得
$result = array_shift($list);

// セッション変数に保存
$_SESSION['result'] = $result;

// 結果ページにリダイレクト
header('Location: http:result.php');
exit;