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

// 確率の合計値を算出
$max = 0;
foreach($list as $value) {
    $max += $value['rate'];
}

// 今回の乱数生成
$point = mt_rand(0, $max - 1);

// 乱数がどこに当たるか調べていく
foreach($list as $value) {
    $max -= $value['rate'];
    // 結果が見つかったら、値を格納
    if($max <= $point) {
        $_SESSION['result'] = $value['name'];
        header('Location: ./result.php');
        exit;
    }
}