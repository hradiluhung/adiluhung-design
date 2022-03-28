<?php
include 'connection.php';
$notif = "Your account have been created!";

if(isset($_POST['add-account'])){
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = mysqli_prepare($conn, "INSERT INTO user (username, fullname, email, password) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ssss", $username, $fullname, $email, $password);
  $hasil = mysqli_stmt_execute($stmt);
  
  if($hasil){
    $notif = "Your account have been created!";
  }else{
    $notif = "Username already exist!";
  }
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
  <title>Sign Up</title>
</head>
<body>
  <div class="circle-1 animate__animated animate__rotateInDownLeft"></div>
  <div class="circle-2 animate__animated animate__rotateInDownRight"></div>

  <div class="container">
    <nav class="topbar">
      <a href="home.php"><img class="logo" src="assets/img/page/logotext.png"></a>
      <a class="index__list btn-primary" href="home.php">Home</a>
    </nav>

    <div class="create-account__content animate__animated animate__fadeInUp">
      <h1 class="create-account__title">
        <?php echo $notif;?>
      </h1>
      <a class="create-account__btn btn-primary" href="login.php">Login</a>
    </div>
    
  </div>
</body>
</html>