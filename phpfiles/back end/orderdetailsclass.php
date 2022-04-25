<?php
include_once "FileManger.php";
class orderdetails
{
    private int $id;
    private string $name;
    private string $size;
    private float $price;
    private FileManger $file;
    function getid():int
    {
        return $this->id;
    }
    function setid(int $id):self
    {
        $this->id=$id;
        return $this;
    }
    function getname():string
    {
        return $this->name;
    }
    function setname(string $name):self
    {
        $this->name=$name;
        return $this;
    }
    function getsize():string
    {
        return $this->size;
    }
    function setsize(string $size):self
    {
        $this->size=$size;
        return $this;
    }
    function getprice():float
    {
        return $this->price;
    }
    function setprice(float $price):self
    {
        $this->price=$price;
        return $this;
    }
    public function __construct(int $id=null,string $name=null,string $size=null,float $price=null)
    {
        if($id!=null) $this->setId($id);
        else $this->id=0;
        if($name!=null) $this->setname($name);
        else $this->name="";
        if($size!=null) $this->setsize($size);
        else $this->size="";
        if($price!=null) $this->setprice($price);
        else $this->price=0;
        $this->file=new FileManger("orderdetails");
    }
    public function ToString()
    {
         $string=$this->id."~".$this->name."~".$this->size."~".$this->price."\r\n";
         return $string;
    }
    public function FromStringToObject($line)
    {
        $Array=explode("~",$line);
        $this->setid(intval($Array[0]));
        $this->setname($Array[1]);
        $this->setsize(intval($Array[2]));
        $this->setprice(str_replace("\r\n","",$Array[3]));
    }
    public function AllIsSet()
    {
        if($this->id==0) return 0;
        if($this->name=="") return 0;
        if($this->size=="") return 0;
        if($this->price==0) return 0;
        return 1;
    }
    public function Create()
    {
        $this->id=$this->file->getLastId()+1;
        if($this->AllIsSet()==0) return 0;
        $line = $this->ToString();
        $this->file->StoreRecord($line);
        return 1;
    }
    public function Delete()
    {
        if($this->id==0) return 0;
        $line=$this->file->getRowById($this->id);
        $this->file->DeleteRecord($line);
        return 1;
    }
    public function Update()
    {
        if($this->id==0)return 0;
        $line = $this->file->getRowById($this->id);
        $Oldorderdetails=new orderdetails();
        $Oldorderdetails->FromStringToObject($line);
        if($this->name=="") $this->setname($Oldorderdetails->getname());
        if($this->size=="") $this->setsize($Oldorderdetails->getsize());
        if($this->price==0) $this->setprice($Oldorderdetails->getprice());
        $this->file->UpdateRecord($this->ToString(),$Oldorderdetails->ToString());
        return 1;
    }
    public function Search()
    {
        $list=$this->file->ListAll();
        for($i=0;$i<count($list)-1;$i++)
        {
           $orderdetails=new orderdetails();
           $orderdetails->FromStringToObject($list[$i]);
           if($this->id!=0)
           {
               if($this->id!=$orderdetails->getid())
               {
                   array_splice($list,$i,1);
                   $i--;
               }
           }
           if($this->name!="")
           {
               if($this->name!=$orderdetails->getname())
               {
                   array_splice($list,$i,1);
                   $i--;
               }
           }
           if($this->size!="")
           {
               if($this->size!=$orderdetails->getsize())
               {
                   array_splice($list,$i,1);
                   $i--;
               }
           }
           if($this->price!=0)
           {
               if($this->price!=$orderdetails->getprice())
               {
                   array_splice($list,$i,1);
                   $i--;
               }
           }
        }
        $DisplayedList=[];
        $x=["orderdetails id","orderdetails name","orderdetails size","orderdetails price"];
        array_push($DisplayedList,$x);
        for($i=0;$i<count($list);$i++)
        {
            $Array=explode("~",$list[$i]);
            array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
}