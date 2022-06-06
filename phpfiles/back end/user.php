<?php
include_once "OrderClass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_POST["Create"]))
{
    $user = new user();
    $user->setname($_POST["Name"]);
    $user->setDateOfBirth(intval($_POST["Age"]));
    $user->settype($_POST["Address"]);
    $user->Add();
    header("Location:user.html");
}

if(isset($_POST["Update"]))
{
    $User = new user();
    $User->setid(intval($_POST["Id"]));
    $User->setname($_POST["Name"]);
    $User->setage(intval($_POST["Age"]));
    $User->setaddress($_POST["Address"]);
    $User->Update();
    header("Location:user.html");
}
if(isset($_POST["Delete"]))
{
    $user = new user();
    $user->setid(intval($_POST["Id"]));
    $user->setname($_POST["Name"]);
    $user->setage(intval($_POST["Age"]));
    $user->setaddress($_POST["Address"]);
    $user->Delete();
    header("Location:user.html");
}
if(isset($_POST["Search"]))
{
    $user = new user();
    $user->setid(intval($_POST["Id"]));
    $user->setname($_POST["Name"]);
    $user->setage(intval($_POST["Age"]));
    $user->setaddress($_POST["Address"]);
    $List = $user->Search();

    DisplayList($List);
}