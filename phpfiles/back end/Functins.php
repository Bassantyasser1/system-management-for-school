<?php
// do all file manipulations

// Mapping NFR to code : Encryption
function Encrypt($Word, $Key)
{
    $Result = "";
    for ($i = 0; $i < strlen($Word); $i++) {
        $c = chr(ord($Word[$i]) + $Key + $i);
        $Result .= $c;
    }
    return $Result;
}
function Decrypt($Word, $Key)
{
    $Result = "";
    for ($i = 0; $i < strlen($Word); $i++) {
        $c = chr(ord($Word[$i]) - $Key - $i);
        $Result .= $c;
    }
    return $Result;
}

//CRUD

//Create
function StoreRecord($fileName, $record)
{
    $myfile = fopen($fileName, "a+");
    fwrite($myfile, $record . "\r\n");
    fclose($myfile);
}

//Read
function getRowById($fileName, $Separator, $id)
{

    if (!file_exists($fileName)) {
        return 0;
    }

    $myfile = fopen($fileName, "r+") or die("Unable to open file!");
    $LastId = 0;
    while (!feof($myfile)) {
        $line = fgets($myfile);
        $ArrayLine = explode($Separator, $line);

        if ($ArrayLine[0] == $id) {
            return $line;
        }

    }
    return false;
}

function getLastId($fileName, $Separator)
{

    if (!file_exists($fileName)) {
        return 0;
    }

    $myfile = fopen($fileName, "r+") or die("Unable to open file!");
    $LastId = 0;
    while (!feof($myfile)) {
        $line = fgets($myfile);
        $ArrayLine = explode($Separator, $line);

        if ($ArrayLine[0] != "") {
            $LastId = $ArrayLine[0];
        }

    }
    return $LastId;
}

function SearhKeyword($fileName, $Search)
{
    $myfile = fopen($fileName, "r+") or die("Unable to open file!");

    $Result = "";
    $j = 0;
    while (!feof($myfile)) {
        $line = fgets($myfile);
        $i = strpos($line, $Search);

        if ($i >= 0 && $i != null) {
            $Result[$j] = $line;
            $j++;

        }
    }
    fclose($myfile);
    return $Result;

}
function searchUser($fileName, $Search)
{
    $myfile = fopen($fileName, "r+") or die("Unable to open file!");
    while (!feof($myfile)) {
        $line = fgets($myfile);
        $i = strpos($line, $Search);

        if ($i >= 0 && $i != null) {

            return $line;
        }
    }
    fclose($myfile);
    return false;

}

//update
function UpdateRecord($fileName, $Newrecord, $OldRecord)
{

    $contents = file_get_contents($fileName);
    //replace recrd with null in content
    $contents = str_replace($OldRecord, $Newrecord, $contents);
    file_put_contents($fileName, $contents);
}
//Delete
function DeleteRecord($fileName, $record)
{

    $contents = file_get_contents($fileName);
    //replace recrd with null in content
    $contents = str_replace($record, '', $contents);
    file_put_contents($fileName, $contents);
}

function ListAll($fileName)
{
    $myfile = fopen($fileName, "r+");
    $i = 0;
    while (!feof($myfile)) {
        $line[$i] = fgets($myfile);
        $i++;
    }
    return $line;
}
