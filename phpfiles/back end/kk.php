<?php

//include "UserFnc.php";
include "Functins.php";

//addUser("mmmm@aa.com","123","Steven","1/11/2009");

$record = getRowById("UsersFile.txt","~",14);
//echo $result;

DeleteRecord("UsersFile.txt",$record);
?>
