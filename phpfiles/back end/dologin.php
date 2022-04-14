<?php
include "UserFnc.php";

$pass=Encrypt($_REQUEST["Password"],2);

if (Login($_POST["Email"],$pass))
{
	echo "Success";
	session_start();
	
	$_SESSION["Email"]=$_POST["Email"];
	echo 	$_SESSION["Email"];
	
}
else
{
	echo "False Login";
}
?>