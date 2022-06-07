<?php
include_once "filemanger.php";
class login
{
    public function __construct(int $Id = null,string $Name =null,float $Price = null,string $Type = null)
    {
        if($Id!=null)$this->setId($Id);
        else $this->Id=0;
        if($Name!=null)$this->setName($Name);
        else $this->Name="";
        $this->File=new FileManger("menu");

    }

}