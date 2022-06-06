<?php 
  include_once "OrderClass.php";
  //include_once "FileManger.php";
  include_once "Functions.php";

  if(isset($_POST["creat"]))
  {
     $order =new order();
     $order->setName($_POST["Client id"]);
     $order->setClientId(intval($_POST["password"]));  
     $order->setDate($_POST["Data"]);
     $order->setTotal($_POST["Total"]);
     $order->Add();
     header("Location:order.html");
  }

  if(isset($_POST["Update"]))
  {
      $order=new order();
      $order->setid(intval($_POST["id"]));
      $order->setname($_POST["name"]);
      $order->setTotal($_POST["password"]);
      $order->settype($_POST["type"]);
      $order->Update();
      header("Location:order.html");
  }

  if(isset($_POST["delete"]))
  {
       $order =new order();
       $order->setid(intval($_POST["id"]));
       $order->setname($_POST["name"]);
       $order->setpassword(intval($_POST["password"]));
       $order->settype($_POST["type"]);
       $order->delete();
       header("Location:order.html");
  }

  if(isset($_POST["search"]))
  {
      $order=new order();
      $order->setid(intval($_POST["id"]));
      $order->setname($_POST["name"]);
      $order->setpassword(intval($post["password"]));
      $order->settype($post["type"]);
      $order->Searsh();
      DisplayList($list);
  }