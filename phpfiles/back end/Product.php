<?php 
include_once "ProductClass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_POST["Create"]))
{
    $Product = new Product();

    $Product->setName($_POST["Name"]);
    $Product->setPrice(floatval($_POST["Price"]));
    $Product->setType($_POST["Type"]);
    $Product->Create();
    header("Location:Product.html");
}
if(isset($_POST["Update"]))
{
    $Product = new Product();
    $Product->setId(intval($_POST["Id"]));
    $Product->setName($_POST["Name"]);
    $Product->setPrice(floatval($_POST["Price"]));
    $Product->setType($_POST["Type"]);
    $Product->Update();
    header("Location:Product.html");
}
if(isset($_POST["Delete"]))
{
    $Product = new Product();
    $Product->setId(intval($_POST["Id"]));
    $Product->setName($_POST["Name"]);
    $Product->setPrice(floatval($_POST["Price"]));
    $Product->setType($_POST["Type"]);
    $Product->Delete();
    header("Location:Product.html");
}
if(isset($_POST["Search"]))
{
    $Product = new Product();
    $Product->setId(intval($_POST["Id"]));
    $Product->setName($_POST["Name"]);
    $Product->setPrice(floatval($_POST["Price"]));
    $Product->setType($_POST["Type"]);
    $List = $Product->Search();

    DisplayList($List);
}