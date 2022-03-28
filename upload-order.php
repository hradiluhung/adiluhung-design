<?php
include 'connection.php'; 
session_start();

if(!isset($_SESSION['name'])){
  header("Location: home.php");
}

if(isset($_POST['order_submit'])){
  $order_img = $_FILES["order_img"]["name"];
  $tempname = $_FILES["order_img"]["tmp_name"];
  $folder = "assets/img/order-img/".$order_img;

  $final_price = $_POST['final_price'];
  $username = $_SESSION['name'];
  $order_type = $_POST['order_type'];

  $addOrderQuery = mysqli_prepare($conn, "INSERT INTO orderlist (order_img, order_finalprice, username, ordertype_id) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($addOrderQuery, "siss", $order_img, $final_price, $username, $order_type);
  $hasilAddOrder = mysqli_stmt_execute($addOrderQuery);

  if($hasilAddOrder){
    move_uploaded_file($tempname, $folder);
    $_SESSION['notif'] = "Your order is in the queue. Please wait for the confirmation";
    header("Location: orderlist.php");
  }else {
    header("Location: order.php");
  }
}
?>