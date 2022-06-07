<?php
interface decorator {
    public function TotalCost();
}

abstract class Add implements decorator {
    public decorator $Obj;

    protected $Cost;
	function __construct(decorator $Obj) {
        $this->Obj = $Obj;
	}


    public function getCost()
    {
        if($this->Cost > 0)
        {
            return $this->Cost;
        }
        
    }


    public function setCost($Cost)
    {
        if($Cost > 0)
        {
            $this->Cost = $Cost;
        }
        

        return $this;
    }
}
?>