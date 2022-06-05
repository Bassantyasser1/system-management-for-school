<?php 
include_once "orderdetailsclass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_POST["Create"]))
{
    $Product = new Product();

    $Product->setName($_POST["Name"]);
    $Product->setPrice(floatval($_POST["Price"]));
    $Product->setType($_POST["Type"]);
    $Product->Create();
    header("Location:orderdetails.html");
}
if(isset($_POST["Update"]))
{
    $orderdetails = new Product();
    $orderdetails->setId(intval($_POST["Id"]));
    $orderdetails->setName($_POST["Name"]);
    $orderdetails->setPrice(floatval($_POST["Price"]));
    $orderdetails->setType($_POST["Type"]);
    $orderdetails->Update();
    header("Location:orderdetails.html");
}
if(isset($_POST["Delete"]))
{
    $orderdetails = new Product();
    $orderdetails->setId(intval($_POST["Id"]));
    $orderdetails->setName($_POST["Name"]);
    $orderdetails->setPrice(floatval($_POST["Price"]));
    $orderdetails->setType($_POST["Type"]);
    $orderdetails->Delete();
    header("Location:orderdetails.html");
}
if(isset($_POST["Search"]))
{
    $orderdetails = new Product();
    $orderdetails->setId(intval($_POST["Id"]));
    $orderdetails->setName($_POST["Name"]);
    $orderdetails->setPrice(floatval($_POST["Price"]));
    $orderdetails->setType($_POST["Type"]);
    $List = $orderdetails->Search();

    DisplayList($List);
}