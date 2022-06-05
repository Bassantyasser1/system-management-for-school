<?php
include_once "UserTypeMenuClass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_POST["Creat"]))
{
    
    $UserTypeMenu = new UserTypeMenu();

    $UserTypeMenu->setUserName($_POST["UserName"]);
    $UserTypeMenu->setUserType($_POST["Type"]);
    $UserTypeMenu->setactivity($_POST["activity"]);
    $UserTypeMenu->Create();
   

    header("Location:UserTypeMenu");
}
if(isset($_POST["Update"]))
{
    $UserTypeMenu = new UserTypeMenu();
    $UserTypeMenu->setid(intval($_POST["id"]));
    $UserTypeMenu->setUserName($_POST["UserName"]);
    $UserTypeMenu->setUserType($_POST["Price"]);
    $UserTypeMenu->setactivity($_POST["activity"]);
    $UserTypeMenu->Update();
    header("Location:UserTypeMenu.html");
}
if(isset($_POST["Delete"]))
{
    $UserTypeMenu = new UserTypeMenu();
    $UserTypeMenu->setid(intval($_POST["id"]));
    $UserTypeMenu->setUserName($_POST["UserName"]);
    $UserTypeMenu->setUserType($_POST["Price"]);
    $UserTypeMenu->setactivity($_POST["activity"]);
    $UserTypeMenu->Delete();
    header("Location:UserTypeMenu.html");
}
if(isset($_POST["Search"]))
{
    $UserTypeMenu = new UserTypeMenu();
    $UserTypeMenu->setid(intval($_POST["id"]));
    $UserTypeMenu->setUserName($_POST["UserName"]);
    $UserTypeMenu->setUserType($_POST["Price"]);
    $UserTypeMenu->setactivity($_POST["activity"]);
    $List = $UserTypeMenu->Search();

    DisplayList($List);
}