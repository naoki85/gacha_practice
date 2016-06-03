<?php
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

require_once '../template/template_header.php';
?>

<!-- 本体 -->
<?php if(isset($_SESSION['survey_msg'])): ?>
    <span style="color:#ff0000;"><?php echo $_SESSION['survey_msg']; ?>
<?php endif; ?>

<h3>アンケートにご協力をお願いします。</h3>
<form action="survey_done.php" method="post">
    <h4>現在の業務内容、言語の中で一番近いものを選んでください。（必須。1つ選択）</h4>
        <ul>
            <li><input type="radio" name="question_1" value=0 />　量販店</li>
            <li><input type="radio" name="question_1" value=1 />　JavaScript</li>
            <li><input type="radio" name="question_1" value=2 />　PHP + SQL</li>
            <li><input type="radio" name="question_1" value=3 />　Java + SQL</li>
            <li><input type="radio" name="question_1" value=4 />　ShellScript</li>
            <li><input type="radio" name="question_1" value=5 />　設計、要件定義</li>
            <li><input type="radio" name="question_1" value=6 />　テスト、デバッグ</li>
        </ul>
    <h4>今後の勉強会ではどのようなことをやりたいですか？（必須。1つ選択）</h4>
        <ul>
            <li><input type="radio" name="question_2" value=0 />　講義形式（外部の有識者を呼ぶことも含め）</li>
            <li><input type="radio" name="question_2" value=1 />　LT形式（15分くらいでミニ技術発表会なイメージ）</li>
            <li><input type="radio" name="question_2" value=2 />　ハッカソン形式（決まった時間内でお題のものを作り、レビューを行う）</li>
            <li><input type="radio" name="question_2" value=3 />　その他</li>
            <li><input type="text" name="question_2_other" /></li>
        </ul>
    <h4>ご意見ご感想など（自由回答）</h4>
    <textarea name="question_3" cols=50 rows=5></textarea>
    <div><input type="submit" value="アンケートに協力する" /></div>
</form>


<?php
require_once '../template/template_footer.php';