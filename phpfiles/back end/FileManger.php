<?php
// do all file manipulations
class FileManger
{
    private $fileName;
    private $Separator = "~";
    public function __construct($filename) {
        $this->fileName ="../files/". $filename.".txt";
    }
// Mapping NFR to code : Encryption
    function Encrypt()
    {
        $Word = file_get_contents($this->fileName);
        $Result = "";
        $Key = 10;
        for ($i = 0; $i < strlen($Word); $i++) {
            $c = chr(ord($Word[$i]) + $Key + $i);
            $Result .= $c;
        }
        file_put_contents($this->fileName, $Result);
    }
    function Decrypt()
    {
        $Word = file_get_contents($this->fileName);
        $Result = "";
        $Key = 10;
        for ($i = 0; $i < strlen($Word); $i++) {
            $c = chr(ord($Word[$i]) - $Key - $i);
            $Result .= $c;
        }
        file_put_contents($this->fileName, $Result);
    }

    //CRUD

    //Create

    function StoreRecord($record)
    {
        $this->Decrypt();
        $myfile = fopen($this->fileName, "a+");
        fwrite($myfile, $record );
        fclose($myfile);
        $this->Encrypt();
    }

    //Read
    function getRowById($id)
    {
        $this->Decrypt();
        if (!file_exists($this->fileName)) {
            $this->Encrypt();
            return 0;
        }

        $myfile = fopen($this->fileName, "r+") or die("Unable to open file!");
        $LastId = 0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $ArrayLine = explode($this->Separator, $line);

            if ($ArrayLine[0] == $id) {
                $this->Encrypt();
                return $line;
            }

        }
        $this->Encrypt();
        return false;
    }

    function getLastId()
    {

        if (!file_exists($this->fileName)) {
            return 0;
        }
        $this->Decrypt();
        $myfile = fopen($this->fileName, "r+") or die("Unable to open file!");
        $LastId = 0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $ArrayLine = explode($this->Separator, $line);

            if ($ArrayLine[0] != "") {
                $LastId = $ArrayLine[0];
            }

        }
        $this->Encrypt();
        return $LastId;
    }

    function SearhKeyword($Search)
    {
        $this->Decrypt();
        $myfile = fopen($this->fileName, "r+") or die("Unable to open file!");

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
        $this->Encrypt();
        return $Result;

    }
    function searchUser($Search)
    {
        $this->Decrypt();
        $myfile = fopen($this->fileName, "r+") or die("Unable to open file!");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $i = strpos($line, $Search);

            if ($i >= 0 && $i != null) {
                $this->Encrypt();
                return $line;
            }
        
        }
        fclose($myfile);
        $this->Encrypt();
        return false;

    }

    //update
    function UpdateRecord( $Newrecord, $OldRecord)
    {
        $this->Decrypt();
        $contents = file_get_contents($this->fileName);
        //replace recrd with null in content
        $contents = str_replace($OldRecord, $Newrecord, $contents);
        file_put_contents($this->fileName, $contents);
        $this->Encrypt();
    }
    //Delete
    function DeleteRecord ($record)
    {
        $this->Decrypt();
        $contents = file_get_contents($this->fileName);
        //replace recrd with null in content
        $contents = str_replace($record, '', $contents);
        file_put_contents($this->fileName, $contents);
        $this->Encrypt();
    }

    function ListAll()
    {
        $this->Decrypt();
        $myfile = fopen($this->fileName, "r+");
        $i = 0;
        while (!feof($myfile)) {
            $line[$i] = fgets($myfile);
            $i++;
        }
        $this->Encrypt();
        return $line;
    }
}