<?php
include 'connection.php'; 
session_start();

if(!isset($_SESSION['name'])){
  header("Location: home.php");
}


$notif = "";

if(isset($_POST['edit-account'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $_SESSION['name'] = $username;

  $editAccountQuery = mysqli_prepare($conn, "UPDATE user SET username=?, fullname=?, email=?, password=? WHERE username=?");
  mysqli_stmt_bind_param($editAccountQuery, 'sssss', $username, $fullname, $email, $password, $username);
  mysqli_stmt_execute($editAccountQuery);
  $hasil = mysqli_stmt_get_result($editAccountQuery);
  
  if($hasil) {
    $notif = "Your profile is updated!";
  } else {
    $notif = "Your profile is not updated!";
  }
}

$showProfileQuery = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ?");
mysqli_stmt_bind_param($showProfileQuery, 's', $_SESSION['name']);
mysqli_stmt_execute($showProfileQuery);
$print = mysqli_stmt_get_result($showProfileQuery);
$hasil = mysqli_fetch_array($print);

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
  <title>Edit Profile</title>
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
        <li><a class="index__list" href="index.php">Home</a></li>
        <li><a class="index__list" href="about.php">About Vector</a></li>
        <li><a class="index__list" href="contact.php">Contact</a></li>
        <li class="btn-account">
          <a href="orderlist.php"><img class="index__list order-btn" src="assets/img/page/order.png"></a> 
          <div class="index__list profile-btn"><img class="profile-picture" src="assets/img/page/user.png"></div>
        </li>
      </ul>
    
      <div class="profile-dropdown">
        <ul class="dropdown-lists">
          <li class="dropdown-list"><a class="dropdown-link" href="orderlist.php">Your order</a></li>
          <div class="line"></div>
          <li class="dropdown-list"><a class="dropdown-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="profile__content animate__animated animate__fadeInUp">
      <h1 class="profile__title">Edit your profile</h1>
      <span class="profile__notif"><?php echo $notif?></span>
      <form class="profile__info" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="profile__info-section">
          <div class="profile__input">
            <label class="profile__input-label" for="username">Username</label>
            <input class="profile__input-field" type="text" name="username" id="username" placeholder="Fill your password" value="<?php echo $hasil['username']?>" required>
          </div>
          <div class="profile__input">
            <label class="profile__input-label" for="fullname">Full Name</label>
            <input class="profile__input-field" type="text" name="fullname" id="fullname" placeholder="Fill your full name" value="<?php echo $hasil['fullname']?>" required>
          </div>
          <div class="profile__input">
            <label class="profile__input-label" for="email">Email</label>
            <input class="profile__input-field" type="email" name="email" id="email" placeholder="Fill your email" value="<?php echo $hasil['email']?>" required>
          </div>
        </div>

        <div class="profile__info-section">
          <div class="profile__input">
            <label class="profile__input-label" for="password">Password</label>
            <input class="profile__input-field" type="password" name="password" id="password" placeholder="Fill your password" value="<?php echo $hasil['password']?>" minlength="8" onchange="validatePassword()" required>
          </div>
          <div class="profile__input">
            <label class="profile__input-label" for="password-confirm">Confirm Password</label>
            <input class="profile__input-field" type="password" name="password-confirm" id="password-confirm" placeholder="Confirm your password" minlength="8" onchange="validatePassword()" required>
          </div>
          <div class="profile__input">
            <a class="profile__input-cancel" href="index.php">Cancel</a>
            <input class="profile__input-btn" type="submit" name="edit-account" value="Save">
          </input>
        </div>
      </form>  
    </div>
    
  </div>

  <script src="assets/js/js.js"></script>
</body>
</html>