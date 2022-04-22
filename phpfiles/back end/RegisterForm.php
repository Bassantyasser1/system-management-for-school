<?php
include "UserFnc.php";

$pass=Encrypt($_REQUEST["Password"],2);

if (addUser($_POST["Email"],$pass,$_REQUEST["FullName"],$_REQUEST["DOB"]))
{
	echo "Success";
	header("Location: ListAllUsers.php?Msg=Record Added Sucessfully");
}
else
{
	echo "Duplicate email";
}
?>