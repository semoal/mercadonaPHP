<?php
include_once 'functions.php';
sec_session_start();


$params = session_get_cookie_params();
setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
$_SESSION["username"] = 'username';

header("Location: ../index");
exit();

?>