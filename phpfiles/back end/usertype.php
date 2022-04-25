<?php
include_once "usertypeclass.php";
include_once "FileManger.php";
include_once "Functions.php";
if(isset($_POST["Create"]))
{
    $usertype = new usertype();
    $usertype->setName($_POST["name"]);
    $usertype->setbirthdate($_POST["birthdate"]);
    $usertype->setage(intval($_POST["age"]));
    $usertype->getgender($_POST["gender"]);
    $usertype->Create();
    header("Location:usertype.html");
}
if(isset($_POST["Update"]))
{
    $usertype =new usertype();
    $usertype->setId(intval($_POST["id"]));
    $usertype->setName($_POST["name"]);
    $usertype->setbirthdate($_POST["birthdate"]);
    $usertype->setage(intval($_POST["age"]));
    $usertype->setgender($_POST["gender"]);
    $usertype->Update();
    header("Location:usertype.html");
}
if(isset($_POST["Delete"]))
{
    $usertype = new usertype();
    $usertype->setId(intval($_POST["id"]));
    $usertype->setName($_POST["name"]);
    $usertype->setbirthdate($_POST["birthdate"]);
    $usertype->setage(intval($_POST["age"]));
    $usertype->setgender($_POST["gender"]);
    $usertype->Delete();
    header("Location:usertype.html");
}
if(isset($_POST["Search"]))
{
    $usertype= new usertype();
    $usertype->setId(intval($_POST["id"]));
    $usertype->setName($_POST["name"]);
    $usertype->setbirthdate($_POST["birthdate"]);
    $usertype->setage(intval($_POST["age"]));
    $usertype->setgender($_POST["gender"]);
    $list=$usertype->Search();
    DisplayList($list);
}