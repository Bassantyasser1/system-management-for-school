<?php 
include_once "FileManger.php";
abstract class Pay{
    protected $FileObj;
    public abstract function Pay($l);
} 
Class fawery extends Pay{

    public function Pay($l) {
        $line=$this->FileObj->getId().$this->FileObj->getSeparator().$l;
        $this->FileObj->store_dataFile($line);
    }
}
?>