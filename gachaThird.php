<?php
session_start();

// すでにセッションに値が格納されていればリダイレクト
if(isset($_SESSION['result'])) {
    return header('Location: http:index.php');
}

// 配列に値を格納
$list = array(
    array('name' => 'blueEyesWhiteDragon',      'rate' =>  5),
    array('name' => 'redEyesBlackDragon',       'rate' => 10),
    array('name' => 'gyaraxyEyesFotonDragon',   'rate' => 15),
    array('name' => 'oddEyesPendulumDragon',    'rate' => 20),
);

$_SESSION['list'] = $list;

// 配列展開用
$data = array();

foreach($list as $value) {
    for($i = 0; $i <= $value['rate']; $i++) {
        array_push($data, $value['name']);
    }
}

// 配列を混ぜる
shuffle($data);

// 配列の先頭1件を取得
$result = array_shift($data);

// セッション変数に保存
$_SESSION['result'] = $data;
$_SESSION['array_flg'] = 1;

// 結果ページにリダイレクト
header('Location: http:result.php');
exit;