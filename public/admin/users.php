<?php
require_once '../db.php';

$sql = 'SELECT * FROM `users`';
$prepare = $db->prepare($sql);
$prepare->execute();
$users = $prepare->fetchAll();

var_dump($users);
?>
