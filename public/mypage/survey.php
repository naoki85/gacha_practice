<?php
session_start();
if(!$_SESSION['user_id']) {
    return header('Location: ../login/login.php');
}

require_once '../template/template_header.php';
?>

<!-- 本体 -->
<?php if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    } ?>
<h3>アンケートにご協力をお願いします。</h3>
<form action="survey_done.php" method="post">
    <ul>
        <li>現在の業務内容、言語の中で一番近いものを選んでください。（必須。1つ選択）</li>
            <input type="radio" name="question_1" value="0" />量販店<br />
            <input type="radio" name="question_1" value="1" />JavaScript<br />
            <input type="radio" name="question_1" value="2" />PHP + SQL<br />
            <input type="radio" name="question_1" value="3" />Java + SQL<br />
            <input type="radio" name="question_1" value="4" />ShellScript<br />
            <input type="radio" name="question_1" value="5" />設計、要件定義<br />
            <input type="radio" name="question_1" value="6" />テスト、デバッグ<br />
        <li>今後の勉強会ではどのようなことをやりたいですか？（必須。1つ選択）</li>
            <input type="radio" name="question_2" value="0" />講義形式（外部の有識者を呼ぶことも含め）<br />
            <input type="radio" name="question_2" value="1" />LT形式（15分くらいでミニ技術発表会なイメージ）<br />
            <input type="radio" name="question_2" value="2" />ハッカソン形式（決まった時間内でお題のものを作り、レビューを行う）<br />
            <input type="radio" name="question_2" value="3" />その他<br />
            <input type="text" name="question_2_other" /><br />
        <li>ご意見ご感想など（自由回答）</li>
            <textarea name="question_3"></textarea>
        <li><input type="submit" value="アンケートに協力する" /></li>
    </ul>
</form>


<?php
require_once '../template/template_footer.php';