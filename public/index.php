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

require_once 'https://gacha-practice.herokuapp.com/template/template_header.php';
?>
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
<button class="btn" type="button" onclick="location.href='./login/add.php'">
        新規登録する
</button>
<button class="btn" type="button" onclick="location.href='./login/login.php'">
        ログインする
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
<?php
require_once 'https://gacha-practice.herokuapp.com/template/template_footer.php';
?>