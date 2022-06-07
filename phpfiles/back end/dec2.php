<?php
include_once("addition.php");
Class dec2 extends add
{
    public function TotalCost()
    {
        return $this->Obj->TotalCost() + $this->Cost;
    }
}
?>