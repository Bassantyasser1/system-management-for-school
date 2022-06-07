<?php

include_once "filemanger.php";
class menu
{
    private int $Id=0;
    private string $Name="";
    private float $Price=0;
    private string $Type;
    private FileManger $File;
    public function __construct(int $Id = null,string $Name =null,float $Price = null,string $Type = null)
    {
        if($Id!=null)$this->setId($Id);
        else $this->Id=0;
        if($Name!=null)$this->setName($Name);
        else $this->Name="";
        if($Price!=null)$this->setPrice($Price);
        else $this->Price=0;
        if($Type!=null)$this->setType($Type);
        else $this->Type="";
        $this->File=new FileManger("menu");

    }
    public function Tostring()
    {
        $String =$this->Id."~".$this->Name."~".$this->Price."~".$this->Type."\r\n";
        return $String;
    }
    public function FromStringToObject($Line)
    {
        $Array=explode("~",$Line);
        $this->setId(intval($Array[0]));
        $this->setName($Array[1]);
        $this->setPrice(floatval($Array[2]));

        $this->setType(str_replace("\r\n","",$Array[3]));
    }
    public function AllIsSet()
    {
        if($this->Id==0)return 0;
        if($this->Name=="")return 0;
        if($this->Price==0)return 0;
        if($this->Type=="")return 0;
        return 1;
    }
    public function create()
    {
        $this->Id=$this->File->getLastId()+1;
        if($this->AllIsSet()==0)return 0;
        $Line=$this->Tostring();
        $this->File->StoreRecord($Line);
        return 1;
    }
    public function Delete()
    {
        if($this->Id==0)return 0;
        $Line=$this->File->getRowById($this->Id);
        $this->File->DeleteRecord($Line);
        return 1;
    }
    public function Update()
    {
        if($this->Id==0)return 0;
        $Line =$this->File->getRowById($this->Id);
        $Oldmenu=new menu();
        $Oldmenu->FromStringToObject($Line);
        if($this->Name=="")$this->setName($Oldmenu->getName());
        if($this->Price==0)$this->setPrice($Oldmenu->getPrice());
        if($this->Type=="")$this->setType($Oldmenu->getType());
        $this->File->UpdateRecord($this->Tostring(),$Oldmenu->Tostring());
        return 1;
    }
    public function Search()
    {
        $List =$this->File->ListAll();
        for($i=0;$i<count($List)-1;$i++)
        {
            $menu=new menu();
            $menu->FromStringToObject($List[$i]);
            if($this->Id!=0)
            {
                if($this->Id!=$menu->getId())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->Name!="")
            {
               if($this->Name!=$menu->getName())
               {
                   array_splice($List,$i,1);
                   $i--;
               }
            }
            if($this->Price!=0)
            {
                if($this->Price!=$menu->getPrice())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList=[];
        $x=["menu Id","menu Name","menu Price","menu Type"];
        array_push($DisplayedList,$x);
        for($i=0;$i<count($List);$i++)
        {
            $Array =explode("~",$List[$i]);
            array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
    function getId(): int
    {
        return $this->Id;
    }
    function setId(int $Id):self{
        $this->Id=$Id;
        return $this;
    }
    function getName():string{
        return $this->Name;
    }
    function setName(string $Name):self{
        $this->Name=$Name;
        return $this;
    }
    function getPrice():float{
        return $this->Price;
    }
    function setPrice(float $Price):self{
        $this->Price=$Price;
        return $this;
    }
    function getType():string{
        return $this->Type;
    }
    function setType(string $Type): self{
        $this->Type=$Type;
        return $this;
    }

}