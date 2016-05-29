<?php
require_once '../template/db.php';

try {
    $sql = 'UPDATE `users` SET `updated_at` = :time WHERE `id` = :user_id';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':time', time());
    $prepare->bindValue(':user_id', $_SESSION['user_id']);
    $prepare->execute();
    return header('Location: ./mypage.php');
} catch {
    $_SESSION['error_flg'] = "データベース接続エラー②";
    header('Location: ./mypage.php');
    exit;
}