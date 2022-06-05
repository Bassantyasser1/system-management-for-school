<?php 

include_once "FileManger.php";

class UserTypeMenu
{
    private int $id;
    private string $UserType;
    private string $UserName;
    private string $activity;
    private FileManger $file;
    public function __construct(int $id= null, string $UserType= null, string $UserName= null, string $activity= null)
    {
       if($id != null) $this->setid($id);
       else $this->id = 0;
       if($UserName!=null) $this->setUserName($UserName);
       else $this->UserName = "";
       if($UserType!=null) $this->setUserType($UserType);
       else $this->UserType = "";
       if($activity!=null) $this->setactivity($activity);
       else $this->activity = "";

       $this->file= new FileManger("UserTypeMenu");
    }

    public function ToString()
    {
        $String =$this->id."".$this->UserName."". $this->UserType."~".$this->activity."\r\n";
        return $String;
    }
    


    public function FromStringToObject($Line)
    {
        $Array = explode("~",$Line);
        $this->setid(intval($Array[0]));
        $this->setUserName($Array[1]);
        $this->setUserType($Array[2]);
        
        $this->setactivity(str_replace("\r\n","",$Array[3]));
    }

    public function AllIsSet()
    {
        if($this->id==0) return 0;
        if($this->UserName=="") return 0;
        if($this->UserType=="") return 0;
        if($this->activity=="") return 0;
        return 1;
    }


    public function Create()
    {
        $this->id= $this->file->getLastId()+1;
        if($this->AllIsSet()==0) return 0;
        $Line =$this->ToString();
        $this->file->StoreRecord($Line);
        return 1;
    }


    public function delete()
    {
        if($this->id==0) return 0;
        $Line=$this->file->getRowById($this->id);
        $this->file->DeleteRecord($Line);
        return 1;
    }

    public function Update()
    {
        if($this->id==0) return 0;
        $Line=$this->file->getRowById($this->id);
        $oldUserTypeMenu = new UserTypeMenu();
        $oldUserTypeMenu->FromStringToObject(($Line));
        if($this->UserName=="") $this->setUserName($oldUserTypeMenu->getUserName());
        if($this->UserType=="") $this->setUserType($oldUserTypeMenu->getUserType());
        if($this->activity=="") $this->setactivity($oldUserTypeMenu->getactivity());
        $this->file->UpdateRecord($this->ToString(),$oldUserTypeMenu->ToString());
    }


    public function Search()
    {
        $list= $this->file->ListAll();
        for($i=0;$i<count($list);$i++)
        {
            $UserTypeMenu=new UserTypeMenu();
            $UserTypeMenu->FromStringToObject(($list[$i]));
            if($this->id!=0)
            {
                if($this->id!=$UserTypeMenu->getid())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->UserName!="")
            {
                if($this->UserName!=$UserTypeMenu->getUserName())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->UserType!="")
            {
                if($this->UserType!=$UserTypeMenu->getUserType())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            }
            if($this->activity!="")
            {
                if($this->activity!=$UserTypeMenu->getactivity())
                {
                    array_splice($list,$i,1);
                    $i--;
                }

                $DisplayedList=[];
                $x=["UserTypeMenu id","UserTypeMenu UserName","UserTypeMenu UserType", "UserTypeMenu activity"];
                array_push($DisplayedList,$x);
                for ($i=0; $i < count($list); $i++) {
                    $Array = explode("~",$list[$i]);
                    array_push($DisplayedList,$Array);
                }
                return $DisplayedList;
            }
        }
    }

    
    function getid() :int {
        return $this->id;
    }
    function setid(int $id) : self{
        $this->id = $id;
		return $this;
    }

    function getUserName(): string{
        return $this->UserName;
    }

    function setUserName( string $UserName) :self{
        $this->UserName=$UserName;
        return $this;
    }


    function getUserType():string {
        return $this->UserType;
    }

    function setUserType( string $UserType): self{
        $this->UserType=$UserType;
        return $this;
    }

    function getactivity(): string{
        return $this->activity;
    }

    function setactivity( string $activity): self{
        $this->activity=$activity;
        return $this;
    }
}