<?php
session_start();

if(!isset($_SESSION['name'])){
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ANIMATION CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/3dae46e013.js" crossorigin="anonymous"></script>
  <!-- OWN CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>Adiluhung Design</title>
</head>
<body>
  <div class="circle-1 animate__animated animate__rotateInDownLeft"></div>
  <div class="circle-2 animate__animated animate__rotateInDownRight"></div>

  <div class="container">
    <nav class="topbar">
      <a href="index.php"><img class="logo" src="assets/img/page/logotext.png"></a>
      <ul class="index__menus">

        <li><a class="index__list" href="about.php">About Vector</a></li>
        <li><a class="index__list" href="contact.php">Contact</a></li>
        <li class="btn-account">
          <a href="orderlist.php"><img class="index__list order-btn" src="assets/img/page/order.png"></a>
          <div class="index__list profile-btn"><img class="profile-picture" src="assets/img/page/user.png"></div>
        </li>
      </ul>
    
      <div class="profile-dropdown">
        <ul class="dropdown-lists">
          <li class="dropdown-list"><a class="dropdown-link" href="profile.php">Edit profile</a></li>
          <div class="line"></div>
          <li class="dropdown-list"><a class="dropdown-link" href="orderlist.php">Your order</a></li>
          <div class="line"></div>
          <li class="dropdown-list"><a class="dropdown-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    

    <div class="index__content animate__animated animate__fadeInUp">
      <p class="index__greeting">Hello, <?php echo $_SESSION['name'];?>!</p>
      <h1 class="index__title">Which photos do you want us to edit?</h1>
      <div class="index__cards">
        <div class="index__card">
          <img class="index__card-img" src="assets/img/page/ordertype1.png">
          <div class="index__card-content">
            <h3 class="index__card-title">Close Up</h3>
            <p class="index__card-desc">Photo up to the chest</p>
            <p class="index__card-price">IDR 100.000</p>
            <p class="index__card-disclaimer">Price for regular time orders and without additional services</p>
            <a class="index__card-order" href="order.php?order=ordertype1"><span>Order</span></a>
          </div>
        </div>
        <div class="index__card">
          <img class="index__card-img" src="assets/img/page/ordertype2.png">
          <div class="index__card-content">
            <h3 class="index__card-title">Halfbody</h3>
            <p class="index__card-desc">Photo up to the waist</p>
            <p class="index__card-price">IDR 110.000</p>
            <p class="index__card-disclaimer">Price for regular time orders and without additional services</p>
            <a class="index__card-order" href="order.php?order=ordertype2"><span>Order</span></a>
          </div>
        </div>
        <div class="index__card">
          <img class="index__card-img" src="assets/img/page/ordertype3.png">
          <div class="index__card-content">
            <h3 class="index__card-title">Full body</h3>
            <p class="index__card-desc">Photo up to both feet</p>
            <p class="index__card-price">IDR 120.000</p>
            <p class="index__card-disclaimer">Price for regular time orders and without additional services</p>
            <a class="index__card-order" href="order.php?order=ordertype3"><span>Order</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/js.js"></script>
</body>
</html>