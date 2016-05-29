<?php

session_start();

$_SESSION = array();

return header('Location: ../index.php');