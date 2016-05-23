<?php
session_start();
if(!empty($_SESSION["username"])) {
	unset($_SESSION["username"]);
	unset($_SESSION["userId"]);
	session_destroy();
}
session_destroy();
header("Location: ../index.php");
?>