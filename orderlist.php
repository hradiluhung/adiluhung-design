<?php
include 'connection.php'; 
session_start();

if(!isset($_SESSION['name'])){
  header("Location: home.php");
}

$showOrderQuery = mysqli_prepare($conn, "SELECT orderlist.order_id, orderlist.order_img, orderlist.order_finalprice, order_type.ordertype_type FROM orderlist orderlist JOIN order_type ON orderlist.ordertype_id = order_type.ordertype_id WHERE orderlist.username = ?");
mysqli_stmt_bind_param($showOrderQuery, 's', $_SESSION['name']);
mysqli_stmt_execute($showOrderQuery);
$print = mysqli_stmt_get_result($showOrderQuery);
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
  <title>Your Order List</title>
</head>
<body>
  <div class="circle-1 animate__animated animate__rotateInDownLeft"></div>
  <div class="circle-2 animate__animated animate__rotateInDownRight"></div>

  <div class="container">
    <nav class="topbar">
      <div>
        <a href="index.php"><img class="logo" src="assets/img/page/logotext.png"></a>
      </div>
      <ul class="index__menus">
        <li><a class="index__list" href="about.php">About Vector</a></li>
        <li><a class="index__list" href="contact.php">Contact</a></li>
        <li class="btn-account">
          <a class="btn-secondary" href="index.php">Order again</a>
          <div class="index__list profile-btn"><img class="profile-picture" src="assets/img/page/user.png"></div>
        </li>
      </ul>
    
      <div class="profile-dropdown">
        <ul class="dropdown-lists">
          <li class="dropdown-list"><a class="dropdown-link" href="profile.php">Edit profile</a></li>
          <div class="line"></div>
          <li class="dropdown-list"><a class="dropdown-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="orderlist__content animate__animated animate__fadeInUp">
      <h1 class="orderlist__title">Your order list:</h1>
      <div class="orderlist__cards">
        <?php
        if(mysqli_num_rows($print) > 0){
          while($row = mysqli_fetch_assoc($print)){
        ?>
        <div class="orderlist__card">
          <img class="orderlist__card-img" src="assets/img/order-img/<?php echo $row['order_img']; ?>">
          <div class="orderlist__card-info">
            <h3 class="orderlist__card-title">order<?php echo $row['order_id']; ?></h3>
            <h3 class="orderlist__card-type"><?php echo $row['ordertype_type']; ?></h3>
            <p class="orderlist__card-price">IDR <?php echo number_format($row['order_finalprice']); ?></p>
            <span class="orderlist__card-moreinfo">
              <span class="orderlist__card-onprogress">On Progress</span>
              <i class="fa-solid fa-arrow-down btn-download"></i></i>
            </span>
          </div>
        </div>
        <?php
          }
        }else {
          echo "<p class='order__empty'>You don't have any order yet</p>";
        }
        ?>
      </div>

        
    </div>
    
  </div>

  <script src="assets/js/js.js"></script>
</body>
</html>