<?php

include_once "FileManger.php";

class order 
{
    private int $id;
    private string $name;
    private int $password;
    private string $type;
    private FileManger $file;
    public function __constaruct(int $id=null ,string $name =null , int $password =null, string $type =null) {

        if($id!=null) $this->setid($id);
        else $this->id=0;
        if($name!=null) $this->setname($name);
        else $this->name="";
        if($password!=null) $this->setpassword($password);
        else $this->password=0;
        if($type!=null) $this->settype($type);
        else $this->type="";

        $this->file=new FileManger("Order");
    }

    public function toString()
    {
        $string= $this->id."~".$this->name."~".$this->password."~".$this->type."\r\n";
        return $string;
    }

    public function FromStringToObject ($line)
    {
        $array =explode("~",$line);
        $this->setid(intval($array[0]));
        $this->setname($array[1]);
        $this->setpassword(intval($array[2]));
        $this->settype(str_replace("\r\n","",$array[3]));
    }

    public function AllIsSet()
    {
        if($this->id==0) return 0;
        if($this->name=="") return 0;
        if($this->password==0) return 0;
        if($this->type=="") return 0;
        return 1;
    }

    public function Creat()
    {
        //$this->id=$this->file->getLastId()+1;
        if($this->AllIsSet()==0) return 0;
        $line =$this->toString();
        $this->file->StoreRecord($line);
        return 1;
    }

    public function delete()
    {
        if($this->id==0) return 0;
        $line=$this->file->getRowById($this->id);
        $this->file->DeleteRecord($line);
        return 1;
    }


    public function Update()
    {
        if($this->id==0) return 0;
        $line=$this->file->getRowById($this->id);
        $Oldorder= new order();
        $Oldorder->fromstringtoobject($line);
        if($this->name=="") $this->setname($Oldorder->getname());
        if($this->password==0) $this->setpassword($Oldorder->getpassword());
        if($this->type=="") $this->settype($Oldorder->gettype());
        $this->file->UpdateRecord($this->toString(),$Oldorder->toString());
        return 1;
    }


    public function Search()
    {
        $list = $this->file->ListAll();
        for($i=0;$i<count($list);$i++)
        {
            $order =new order();
            $order->fromstringtoobject($list[$i]);
            if($this->id!=0)
            {
                if($this->id!=$order->getid())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->name!="")
            {
                if($this->name!=$order->getname())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->password!=0)
            {
                if($this->password!=$order->getpassword())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->type!="")
            {
                if($this->type!=$order->gettype())
                {
                    array_splice($line,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList=[];
        $x=["order id","order name","order password","order type"];
        array_push($DisplayedList,$x);
        for($i=0;$i<count($list);$i++)
        {
            $array=explode("~",$list[$i]);
            array_push($DisplayedList,$array);
        }
        return $DisplayedList;
    }

    function getid(): int {
        return $this->id;
    }
    function setid(int $id): self{
        $this->id=$id;
        return $this;
    }

    function getname() : string {
        return $this->name;
    }
    function setname(string $name): self{
        $this->name=$name;
        return $this;
    }
    
   function getpassword() : int{
       return $this->password;
   }

   function setpassword( int $password): self{
       $this->password=$password;
       return $this;
   }

   function gettype() : string{
       return $this->type;
   }

   function settype( string $type): self{
       $this->type=$type;
       return $this;
   }

}