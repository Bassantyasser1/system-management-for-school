<?php
include "Functins.php";
$fileName = "UsersFile.txt";


// CREATE
function addUser($Email, $Password, $FullName, $DOB)
{
    global $fileName;
    $id = getLastId($fileName, "~") + 1;
    $record = $id . "~" . $Email . "~" . $Password . "~" . $FullName . "~" . $DOB;
	//echo $record;
    if (searchUser($fileName, $Email) == false) {
        StoreRecord($fileName, $record);
        return true;
    } else {
        return false;
    }

}


// Read
function getUserById($Id)
{
    global $fileName;
    $Record = getRowById($fileName, "~", $Id);

    $ArrayResult = explode("~", $Record);
    $Result['id'] = $ArrayResult[0];
    $Result['Email'] = $ArrayResult[1];
    $Result['Password'] = $ArrayResult[2];
    $Result['FullName'] = $ArrayResult[3];
    $Result['DOB'] = $ArrayResult[4];
    return $Result;
}


function getAllUsers()
{
    global $fileName;
    $R = ListAll($fileName);
    return $R;
}

function getAllUsersByKeyWord($KeyWord)
{
    global $fileName;
    $R = SearhKeyword($fileName, $KeyWord);
    //echo $R[0] ."Ayman";
    return $R;
}
function Login($Email, $Password)
{
    global $fileName;
    if (searchUser($fileName, $Email . "~" . $Password)) {
        return true;
    } else {
        return false;
    }
}


// Update
function UpdateUser($id, $Email, $Password, $FullName, $DOB)
{
    global $fileName;
    $record = $id . "~" . $Email . "~" . $Password . "~" . $FullName . "~" . $DOB . "\r\n";
    $r = getRowById($fileName, "~", $id);
    //echo $record ."NEW <br>";
    //echo $r ."NEW <br>";
    UpdateRecord($fileName, $record, $r);

}


// Delete
function DeleteUser($id)
{
    global $fileName;
    $r = getRowById($fileName, "~", $id);
    //echo $r;
    //exit();
    DeleteRecord($fileName, $r);
}




