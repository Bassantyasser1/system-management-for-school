<form action="ListAllUsers.php" method="post">
Search <input type="text" name="KeyWord" /> <input type="image" src="download.png" align="middle"/>
</form>
<table border="1">
<tr>
	<td colspan="4"><font color=red><?php echo @$_GET["Msg"]; ?></font></td>
</tr>
<tr>
<td>Email</td>
<td>Full Name</td>
<td>DOB</td>
<td>Delete</td>
</tr>


<?php

echo sha1("Ayman11978");
echo "<br>";
echo sha1("2");
echo "<br>";
echo md5("2");
/*
echo sha1("1_30pm122_3_2016");
echo "<br>";
echo sha1("2");
echo "<br>";
echo md5("2");
*/
include "UserFnc.php";
session_start();
if (!isset($_SESSION["Email"]))
{
	//header("Location: login.php?error=2");	
}

if (isset($_REQUEST["KeyWord"]))
{
//	echo "ayman".$_REQUEST["KeyWord"];
$f=getAllUsersByKeyWord($_REQUEST["KeyWord"]);
}
//echo "Welcome Mr". 	$_SESSION["Email"];
else
{
$f=getAllUsers();	
}
for ($i=0;$i<count($f);$i++)
{
	$Row=explode("~",$f[$i]);
	if (count($Row)>2)
	{
		
		
		echo "<tr>";
		for ($j=1;$j<count($Row);$j++)
		{
			if ($j==1)// Generate Link
			{
				echo "<td><a href=updateUser.php?id=$Row[0]>".$Row[$j]."</a></td>";
			}
			else{
				if ($j!=2)//skip Password feild
			echo "<td>".$Row[$j]."</td>";
			}
			
			
		}
		echo "<td><a href=deleteUser.php?id=$Row[0]>X</a></td>";
		echo "</tr>";
		
	}
}
//echo "ayman ". strpos($f,"\r\n");
?>
<tr><td colspan="4" align="center"><a href="RegisterationForm.php">Add new User</a></td></tr>
</table>
This page requires Highl level Permissions