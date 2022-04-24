<?php 
$Id = $_GET["Id"];
include_once "ProductClass.php";
$Product = new Product();
$Product->setId(intval($Id));
$Product->Delete();
header("Location:Product.html");