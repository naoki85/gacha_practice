<?php
require_once '../template/db.php';

$_SESSION['survey_msg'] = '';

$question_1         = $_POST['question_1'];
$question_2         = $_POST['question_2'];
$question_2_other   = $_POST['question_2_other'];
$question_3         = $_POST['question_3'];

if($question_1 == NULL || $question_2 == NULL) {
    $_SESSION['survey_msg'] = "質問１、質問２は回答してください";
    header('Location: ./survey.php');
}

$sql = 'SELECT count(*) FROM `survey` WHERE `user_id` = :user_id';
$prepare = $db->prepare($sql);
$prepare->bindValue(':user_id', $_SESSION['user_id']);
$search_survey = $prepare->execute();
$exist_survey = $search_survey->fetchColumn();
var_dump($question_1);
var_dump($exist_survey);
/*
$survey_flg = 0;
if($exist_survey == 0) {
    $sql = "INSERT INTO `survey` VALUES (null, :user_id, :question_1, :question_2, :question_2_other, :question_3, :created_time, :updated_time)";
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':user_id', $_SESSION['user_id']);
    $prepare->bindValue(':question_1', $question_1);
    $prepare->bindValue(':question_2', $question_2);
    $prepare->bindValue(':question_2_other', $question_2_other);
    $prepare->bindValue(':question_3', $question_3);
    $prepare->bindValue(':created_time', date("Y-m-d H:i:s", time()));
    $prepare->bindValue(':updated_time', date("Y-m-d H:i:s", time()));
var_dump($prepare);

    try {
        $prepare->execute();
        $survey_flg = 1;
    } catch (PDOException $e) {
        $_SESSION['survey_msg'] = "データベース接続エラーです。もう1回試してください。";
        header('Location: ./survey.php');
        exit;
    }

} else {
    $survey_flg = 2;
} */

require_once '../template/template_header.php';
?>

<!-- 本体 -->


<?php
require_once '../template/template_footer.php';
