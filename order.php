<?php
include 'connection.php'; 
session_start();

if(!isset($_SESSION['name'])){
  header("Location: home.php");
}

if(!isset($_GET['order'])){
  header("Location: index.php");
}

$selectOrderType = mysqli_prepare($conn, "SELECT * FROM order_type WHERE ordertype_id=?");
mysqli_stmt_bind_param($selectOrderType,'s',$_GET['order']);
mysqli_stmt_execute($selectOrderType);
$hasilOrderType = mysqli_stmt_get_result($selectOrderType);
$hasil = mysqli_fetch_array($hasilOrderType);
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
  <title>Order Process</title>
</head>
<body>
  <div class="circle-1 animate__animated animate__rotateInDownLeft"></div>
  <div class="circle-2 animate__animated animate__rotateInDownRight"></div>

  <div class="container">
    <nav class="topbar">
      <div>
        <a href="index.php"><i class="fa-solid fa-arrow-left btn-back"></i></a>
        <a href="index.php"><img class="logo" src="assets/img/page/logotext.png"></a>
      </div>
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

    <div class="order__content animate__animated animate__fadeInUp">
      <div class="order__description">
        <img src="assets/img/page/<?php echo $_GET['order'];?>.png" width="300px">
        <h1 class="order__type">
          <?php echo $hasil['ordertype_type'];?>
        </h1>
        <p class="order__desc">
          <?php echo $hasil['ordertype_desc'];?>
        </p>
        <p class="order__disclaimer">Make sure your photo has the same size as the order type!</p>
      </div>
      <form class="order__form" action="upload-order.php" method="post" enctype="multipart/form-data">
        <div class="order__input">
          <label class="order__input-label" for="order_img">Photo</label>
          <div class="order__input-field">
            <label class="order__input-upload" for="order_img">Upload</label>
            <div class="order__upload-filename">Browse your image!</div>
          </div>
          <input class="order__input-field btn-hidden" type="file" name="order_img" id="order_img" onchange="uploadFile(this)" accept="image/png, image/jpeg" required>
        </div>
        <div class="order__input">
          <label class="order__input-label">Additional Service <span class="order__input-adddesc">(Add IDR 10.000 for each)</span></label>
          
          <input type="checkbox" class="order__checkbox" id="fast-service" value="fast-service" onclick="addPrice(this.id)">
          <label class="order__checkbox-label" for="fast-service">Fast service</label>

          <input type="checkbox" class="order__checkbox" id="edit-softfile" value="edit-softfile" onclick="addPrice(this.id)">
          <label class="order__checkbox-label" for="edit-softfile">Softfile edit</label>

          <input type="checkbox" class="order__checkbox" id="watermark" value="watermark" onclick="addPrice(this.id)">
          <label class="order__checkbox-label" for="watermark">Remove watermark</label>
        </div>
        <div class="order__input">
          <label class="order__input-label">Final Price</label>
          <div class="order__input-field" placeholder="Fill your username"><span class="final-price">IDR <?php echo number_format($hasil['ordertype_price']) ?></span></div>
        </div>
        <div class="order__input">
          <input class="order__input-field" id="final_price" class="final_price" type="text" name="final_price" value="">
        </div>
        <div class="order__input">
          <input class="order__input-field" id="order_type" class="order_type" type="text" name="order_type" value="<?php echo $_GET['order'];?>">
        </div>
        <div class="order__input">
          <input class="order__input-field order_submit" type="submit" name="order_submit" value="Order Now">
        </div>
      </form>
    </div>
    
  </div>

  <script src="assets/js/js.js"></script>
</body>
</html>