<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equive='X-UA-Compatile' content='IE = edge'>
    <title>this is test</title>
    <meta name ='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
<body>
    <h1>list all activities</h1>
    <?php
         
         include_once("FileManger.php");
         echo "<h2> this is code from php</h2>";
        $File = new FileManger("user");
       $List = $File->ListAll();
    ?>
    <table border=1>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Password</th>
        </tr>
       <?php 
        for ($i=0; $i < count($List); $i++) { 
            $Array = explode("~",$List[$i]);
            $Id = $Array[0];
            $Name = $Array[1];
            $Password = $Array[2];
            echo "<tr><td>$Id</td><td>$Name</td><td>$Password</td></tr>";
        }
       ?>
    </table>
</body>
</html>