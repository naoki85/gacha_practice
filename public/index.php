<?php

$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";

try {
    $db = new PDO($dsn, $db['user'], $db['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM user';
    $prepare = $db->prepare($sql);
    $prepare->execute();

    echo '<pre>';
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    print_r(h($result));
    echo "\n";
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Error: ' . h($e->getMessage());
}

function h($var)
{
    if (is_array($var)) {
        return array_map('h', $var);
    } else {
        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }
}
?>

<?php
// セッションを初期化
session_start();
$_SESSION = array();

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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>がちゃ</title>
        <link rel="stylesheet" href="my_template.css">
    </head>
    <body>
        <h4>いろいろながちゃ</h4>
        <button class="btn" type="button" onclick="show()">
                がちゃ①
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaSecond.php'">
                がちゃ②
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaThird.php'">
                がちゃ③
        </button>
        <button class="btn" type="button" onclick="location.href='./gachaFourth.php'">
                がちゃ④
        </button>
        <div id="result1">
            <img src="./images/<?php echo $result; ?>.jpg" width="200px">
        </div>

        <!-- JavaScript -->
        <script>
            function show() {
                document.getElementById("result1").style.display="block";
            }
        </script>
    </body>
</html>