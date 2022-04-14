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
        $myfile = fopen("activities.txt", "r+") or die("Unable to open file!");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $Arrayline=explode("~",$line)
            echo $Arrayline[1]."<br>";
        }
        fclose($myfile); 
    ?>
</body>
</html>