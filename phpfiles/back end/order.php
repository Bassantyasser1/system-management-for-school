<?php 
  include_once "orderclass.php";
  include_once "FileManger.php";
  include_once "Functions.php";

  if(isset($_POST["creat"]))
  {
     $order =new order();
     $order->setname($_POST["name"]);
     $order->setpassword(intval($_POST["password"]));  
     $order->settype($_POST["type"]);
     $order->Creat();
     header("Location:order.html");
  }

  if(isset($_POST["Update"]))
  {
      $order=new order();
      $order->setid(intval($_POST["id"]));
      $order->setname($_POST["name"]);
      $order->setpassword($_POST["password"]);
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
      $order->Search();
      DisplayList($list);
  }