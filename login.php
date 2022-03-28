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
  <title>Login</title>
</head>
<body>
  <div class="circle-1 animate__animated animate__rotateInDownLeft"></div>
  <div class="circle-2 animate__animated animate__rotateInDownRight"></div>

  <div class="container">
    <nav class="topbar">
      <a href="home.php"><img class="logo" src="assets/img/page/logotext.png"></a>
      <a class="btn-primary" href="home.php">Home</a>
    </nav>
    <div class="login__content">
      <div class="login__texts animate__animated animate__fadeInUp">
        <h1 class="login__title">Login to order some stuff</h1>
        <div class="login__signup">
          <span class="login__signup-text">Don't have account?</span>
          <a class="login__signup-btn" href="signup.php">Sign Up</a>
        </div>
      </div>
      <div class="login__form animate__animated animate__fadeInUp">
        <form action="action.php" method="post">
          <div class="login__input">
            <label class="login__input-label" for="username">Username</label>
            <input class="login__input-field" type="text" name="username" id="username" placeholder="Fill your username" required>
          </div>
          <div class="login__input">
            <label class="login__input-label" for="password">Password</label>
            <input class="login__input-field" type="password" name="password" id="password" placeholder="Fill your password" required>
          </div>
          <div class="login__input">
            <input class="login__input-btn" type="submit" name="login" value="Log In">
          </div>
        </form>
      </div>
    </div>
    
  </div>
</body>
</html>