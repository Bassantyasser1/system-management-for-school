<?php

include_once"Filemanger.php";

class user
{

    private int $id;
    private string $name;
    private int $age;
    private string $address;
    private FileManger $File;

    public function __construct(int $id = null,string $name = null,int $age = null, string $address = null)
    {
        if($id != null) $this->setid($id);
        else $this->id = 0;
        if($name!=null) $this->setname($name);
        else $this->name = "";
        if($age!=null) $this->setage($age);
        else $this->age = 0;
        if($address!=null) $this->setaddress($address);
        else $this->address = "";
 
        $this->File = new FileManger("user");

    }
    public function ToString()
    {
        $String = $this->id."~".$this->name."~".$this->age."~".$this->address."\r\n";
        return $String;
    }
    public function FromStringToObject($Line)
    {
        $Array = explode("~",$Line);
        $this->setid(intval($Array[0]));
        $this->setname($Array[1]);
        $this->setage(intval($Array[2]));  
        $this->setaddress(str_replace("\r\n","",$Array[3]));
    }
    public function AllIsSet()
    {
        if($this->id == 0) return 0;
        if($this->name == "") return 0;
        if($this->age == 0) return 0;
        if($this->address == "") return 0;
        return 1;
    }
    public function Create()
    {
        
        $this->id = $this->File->getLastId() + 1;
        if($this->AllIsSet() == 0) return 0;
        $Line = $this->ToString();
        $this->File->StoreRecord($Line);
        return 1;
    }
    public function Delete()
    {
        if($this->id == 0) return 0;
        $Line = $this->File->getRowById($this->id);
        $this->File->DeleteRecord($Line);
        return 1;
    }

    public function Update()
    {
        if($this->id == 0) return 0;
        $Line = $this->File->getRowById($this->id);
        $Olduser = new user();
        $Olduser->FromStringToObject($Line);
        if($this->name == "") $this->setname($Olduser->getName());
        if($this->age== 0) $this->setage($Olduser->getage());
        if($this->address == "") $this->setaddress($Olduser->getaddress());
        $this->File->UpdateRecord($this->ToString(),$Olduser->ToString());
        return 1;
    }
    public function Search()
    {
        $List = $this->File->ListAll();
        for ($i=0; $i < count($List)-1; $i++) { 
            $user = new user();
            $user->FromStringToObject($List[$i]);
            if($this->id!=0)
            {
                if($this->id!=$user->getid())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->name!="")
            {
                if($this->name!=$user->getname())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->age!=0)
            {
                if($this->age!=$user->getage())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->address!="")
            {
                if($this->address!=$user->getaddress())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList = [];
        $x = ["Product id","Product name","Product age","Product address"];
        array_push($DisplayedList,$x);
        for ($i=0; $i < count($List); $i++) {
            $Array = explode("~",$List[$i]);
            array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
    function getid(): int {
		return $this->id;
	}
	function setid(int $id): self {
		$this->id = $id;
		return $this;
	}
	function getname(): string {
		return $this->name;
	}
	function setname(string $name): self {
		$this->name = $name;
		return $this;
	}
	function getage(): int {
		return $this->age;
	}
	function setage(int $age): self {
		$this->age = $age;
		return $this;
	}

	function getaddress(): string {
		return $this->address;
	}

	function setaddress(string $address): self {
		$this->address = $address;
		return $this;
    }
}