<?php
include_once "UserClass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_POST["Create"]))
{
    $user = new user();
    $user->setname($_POST["name"]);
    $user->setage(intval($_POST["age"]));
    $user->setaddress($_POST["address"]);
    $user->Create();
    header("Location:user.html");
}
if(isset($_POST["Update"]))
{
    $User = new User();
    $user->setid(intval($_POST["id"]));
    $user->setname($_POST["name"]);
    $user->setage(intval($_POST["age"]));
    $user->setaddress($_POST["address"]);
    $user->Update();
    header("Location:user.html");
}
if(isset($_POST["Delete"]))
{
    $user = new user();
    $user->setid(intval($_POST["id"]));
    $user->setname($_POST["name"]);
    $user->setage(intval($_POST["age"]));
    $user->setaddress($_POST["address"]);
    $user->Delete();
    header("Location:user.html");
}
if(isset($_POST["Search"]))
{
    $user = new Product();
    $user->setid(intval($_POST["id"]));
    $user->setname($_POST["name"]);
    $user->setage(intval($_POST["age"]));
    $user->setaddress($_POST["address"]);
    $List = $user->Search();

    DisplayList($List);
}