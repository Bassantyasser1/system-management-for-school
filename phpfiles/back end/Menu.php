<?php 
  include_once "MenuClass.php";
  include_once "FileManger.php";
  include_once "Functions.php";
  extract($_POST);
  if(isset($_POST["Create"]))
  {
     $menu =new menu();
     $menu->setName($Name);
     $menu->setPrice(floatval($Price));
     $menu->setType($Type);
     $menu->create();
     header("Location:Menu.html");
  }

  if(isset($_POST["Update"]))
  {
    $menu =new menu();
    $menu->setId(intval($Id));
    $menu->setName($Name);
    $menu->setPrice(floatval($Price));
    $menu->setType($Type);
    $menu->update();
    header("Location:Menu.html");
  }

  if(isset($_POST["Delete"]))
  {
    $menu =new menu();
    $menu->setId(intval($Id));
    $menu->setName($Name);
    $menu->setPrice(floatval($Price));
    $menu->setType($Type);
    $menu->delete();
    header("Location:Menu.html");
  }

  if(isset($_POST["Search"]))
  {
    $menu =new menu();
    $menu->setId(intval($Id));
    $menu->setName($Name);
    $menu->setPrice(floatval($Price));
    $menu->setType($Type);
    $menu->search();
    $list=$menu->search();
    DisplayList($list);
  }