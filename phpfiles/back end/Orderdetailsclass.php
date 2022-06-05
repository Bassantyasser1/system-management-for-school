<?php
include_once"FileManger.php";
class orderdetails
{
    private int $Id;
    private  string$Name;
    private string$Size;
    private float$Price;
    private string$Type;
    private FileManger $file;
    public function __construct(int $Id=null ,string$Name=null ,float$price=null ,string$Type=null)
    {
        if($Id != null)$this->setId($Id);
        else $this->Id=0;
        if($Name!=null)$this->setName($Name);
        else $this->Name="";
        if($price!=null)$this->setPrice($price);
        else $this->Price=0;
        if($Type!=null) $this->setType($Type);
        else $this->Type="";
        $this->File = new FileManger("orderdetails");
    }

    public function ToString()
    {
       $String = $this->Id."".$this->Name."".$this->Price."~".$this->Type."\r\n";
       return $String;
    }
    public function FromStringToObject($Line)
    {
      $Array = explode("~",$Line);
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
    public function Create()
    {
        $this->Id=$this->File->getLastId() +1;
        if($this->AllIsSet()==0)return 0;
        $Line =$this->ToString();
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
        $Line=$this->File->getRowById($this->Id);
        $Oldorderdetails=new orderdetails();
        $Oldorderdetails->fromStringToObject($Line);
        if($this->Name=="")$this->setName($Oldorderdetails->getName());
        if($this->Price==0)$this->setType($Oldorderdetails->getPrice());
        if($this->Type=="")$this->setType($Oldorderdetails->getType());
        $this->File->UpdateRecord($this->ToString(),$Oldorderdetails->ToString());
        return 1;
    }
    public function Search()
    {
        $List =$this->File->ListAll();
        for($i=0;$i<count($List)-1;$i++)
        {
            $orderdetails=new orderdetails();
            $orderdetails->FromStringToObject($List[$i]);
            if($this->Id!=0)
            {
                if($this->Id!=$orderdetails->getId())
                {
                    array_splice($list,$i,1);
                    $i--;
                }
            
            }
            if($this->Name!="")
            {
                if($this->Name!=$orderdetails->getName())
                {

                  array_splice($List,$i,1);
                  $i--;
                }
                
            }
        
          if($this->Price!=0)
           {
              if($this->Price!=$orderdetails->getPrice())
               {
                   array_splice($List,$i,1);
                  $i--;
               }
            }
          if($this->Type!="")
          { 
              if($this->Type!=$orderdetails->getType())
              {
                  array_splice($List,$i,1);
                  $i++;
              }
           }
        
            
        }
        $DisplayedList=[];
        $x=["Product Id","Product Name","Product Price"," Product Type"];
        array_push($DisplayedList,$x);
        for($i=0 ; $i <count($List); $i++)
        {
            $Array =explode("~",$List[$i]);
            array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
        }
        function getId():int{
            return $this->Id;
        }
        function setId(int $Id):self{
            $this->Id = $Id;
            return $this ;

        }
        function getName(): string {
            return $this->Name;
        }
       function setName(string $Name):self{
      $this->Name=$Name;
       return $this; 
       }
       function getPrice():float{
           return $this->Price;
       }
       function setPrice(float $Price ): self{
           $this ->Price =$Price;
           return $this;
       }
       function getType():string {
           return $this->Type;
       }
       function setType( string $Type): self {
           $this ->Type = $Type;
           return $this;
       }
    }
