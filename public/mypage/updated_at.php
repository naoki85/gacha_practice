<?php
require_once '../template/db.php';

$updated_at = $_POST['user_updated_time'];

try {
    $sql = 'UPDATE `users` SET `updated_at` = :time WHERE `id` = :user_id';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':time', $updated_at);
    $prepare->bindValue(':user_id', $_SESSION['user_id']);
    $prepare->execute();
    $_SESSION['msg'] = "日付を修正しました。";
    return header('Location: ./mypage.php');
} catch (PDOException $e) {
    $_SESSION['error_flg'] = "データベース接続エラー②";
    header('Location: ./mypage.php');
    exit;
}