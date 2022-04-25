<?php
 include_once "FileManger.php";

 class usertype
 {
    private int $id;
    private string $name;
    private string $birthdate;
    private int $age;
    private string $gender;
    private FileManger $file;

    public function __construct(int $id=null, string $name=null,string $birthdate=null,int $age=null,string $gender=null)
    {
          if($id!=null) $this->setId($id);
          else $this->id=0;
          if($name!=null) $this->setName($name);
          else $this->name="";
          if($birthdate!=null) $this->setbirthdate($birthdate);
          else $this->birthdate="";
          if($age!=null) $this->setage($age);
          else $this->age=0;
          if($gender!=null) $this->setgender($gender);
          else $this->gender="";
          $this->file = new FileManger("usertype"); 
    }

    function getId(): int
    {
          return $this->id;
    }

    function setId(int $id):self
    {
        $this->id=$id;
        return $this;
    }

    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name):self
    {
        $this->name=$name;
        return $this;
    }

    function getbirthdate(): string
    {
        return $this->birthdate;
    }

    function setbirthdate(string $birthdate): self
    {
        $this->birthdate=$birthdate;
        return $this;
    }

    function getage(): int
    {
        return $this->age;
    }

    function setage(int $age): self
    {
        $this->age=$age;
        return $this;
    }

    function getgender(): string
    {
        return $this->gender;
    }

    function setgender(string $gender):self
    {
        $this->gender=$gender;
        return $this;
    }

    public function ToString()
    {
        $string=$this->id. "~".$this->name."~".$this->birthdate."~".$this->age."~".$this->gender."\r\n";
        return $string;
    }

    public function FromStringToObject($Line)
    {
        $Array= explode("~",$Line);
        $this->setId(intval($Array[0]));
        $this->setName($Array[1]);
        $this->setbirthdate($Array[2]);
        $this->setage(intval($Array[3]));
        $this->setgender(str_replace("\r\n","",$Array[4]));
    }
    
    public function AllIsSet()
    {
        if($this->id==0) return 0;
        if($this->name=="") return 0;
        if($this->birthdate=="") return 0;
        if($this->age==0) return 0;
        if($this->gender=="") return 0;
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
        $line = $this->file->getRowById($this->id);
        $this->file->DeleteRecord($line);
        return 1;
    }

    public function Update()
    {
        if($this->id==0) return 0;
        $line = $this->file->getRowById($this->id);
        $Oldusertype = new usertype();
        $Oldusertype->FromStringToObject($line);
        if($this->name=="") $this->setName($Oldusertype->getName());
        if($this->birthdate=="") $this->setbirthdate($Oldusertype->getbirthdate());
        if($this->age==0) $this->setage($Oldusertype->getage());
        if($this->gender=="") $this->setgender($Oldusertype->getgender());
        $this->file->UpdateRecord($this->ToString(),$Oldusertype->ToString());
        return 1;
    }

    public function Search()
    {
        $list = $this->file->ListAll();
        for($i=0;$i<count($list)-1;$i++)
        {
            $usertype = new usertype();
            $usertype->FromStringToObject($list[$i]);
            if($this->id!=0)
            {
                if($this->id!=$usertype->getId())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->name!="")
            {
                if($this->name!=$usertype->getName())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->birthdate!="")
            {
                if($this->birthdate!=$usertype->getbirthdate())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->age!=0)
            {
                if($this->age!=$usertype->getage())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->gender!="")
            {
                if($this->gender!=$usertype->getgender())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList=[];
        $x=["usertype id","usertype name","usertype birthdate","usertype age","usertype gender"];
        array_push($DisplayedList,$x);
        for($i=0;$i<count($list);$i++)
        {
            $Array= explode("~",$list[$i]);
            array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }


 }