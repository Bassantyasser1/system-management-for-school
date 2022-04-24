<?php 
function DisplayList($List)
{
    echo "<table border=1>";
    for ($i=0; $i < count($List) - 1; $i++) { 
        echo "<tr>";
        for ($j=0; $j < count($List[$i]); $j++) { 
            echo "<td>".$List[$i][$j]."</td>";
        }
        $Id = $List[$i][0];
        if($i != 0) {
        echo "<td><a href='ProductDelete.php?Id=$Id'>Delete</a></td>";   
        }
        else {
            echo "<td>Delete</td>";
        }
        echo "<tr>";
    }
    echo "</table>";
}