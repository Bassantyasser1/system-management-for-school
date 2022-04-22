<?php
session_start();
//unset($_SESSION["UserID"]);
	session_destroy();
	header("Location: login.php?error=0");	
?>