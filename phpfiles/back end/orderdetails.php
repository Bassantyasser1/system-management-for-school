<?php
include_once "orderdetailsclass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_post["Create"]))
{
    $orderdetails=new orderdetails();
    $orderdetails->setname($_post["name"]);
    $orderdetails->setsize($_post["size"]);
    $orderdetails->setprice(floatval($_post["price"]));
    $orderdetails->Create();
    header("Location:orderdetails.html");
}
if(isset($_post["Update"]))
{
    $orderdetails=new orderdetails();
    $orderdetails->setid(intval($_post["id"]));
    $orderdetails->setname($_post["name"]);
    $orderdetails->setsize($_post["size"]);
    $orderdetails->setprice(floatval($_post["price"]));
    $orderdetails->Update();
    header("Location:orderdetails.html");
}
if(isset($_post["Delete"]))
{
    $orderdetails=new orderdetails();
    $orderdetails->setid(intval($_post["id"]));
    $orderdetails->setname($_post["name"]);
    $orderdetails->setsize($_post["size"]);
    $orderdetails->setprice(floatval($_post["price"]));
    $orderdetails->Delete();
    header("Location:orderdetails.html");
}
if(isset($_post["Search"]))
{
    $orderdetails=new orderdetails();
    $orderdetails->setid(intval($_post["id"]));
    $orderdetails->setname($_post["name"]);
    $orderdetails->setsize($_post["size"]);
    $orderdetails->setprice(floatval($_post["price"]));
    $list=$orderdetails->Search();
    DisplayList($list);
}