<?php
include "Userfnc.php";

$id=$_REQUEST["id"];
$Email=$_REQUEST["Email"];
$Password=Encrypt($_REQUEST["Password"],2);

$FullName=$_REQUEST["FullName"];
$DOB=$_REQUEST["DOB"];
UpdateUser($id,$Email,$Password,$FullName,$DOB);
header("Location: ListAllUsers.php?Msg=1");	


?>