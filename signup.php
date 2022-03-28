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
      <a href="home.html"><img class="logo" src="assets/img/page/logotext.png"></a>
      <a class="btn-primary" href="home.php">Home</a>
    </nav>

    <div class="signup__content">
      <div class="signup__texts animate__animated animate__fadeInUp">
        <h1 class="signup__title">Create your new account</h1>
        <div class="signup__login">
          <span class="signup__login-text">Already have account?</span>
          <a class="signup__login-btn" href="login.php">Log In</a>
        </div>
      </div>
      <div class="signup__form animate__animated animate__fadeInUp">
        <form action="create-account.php" method="post">
          <div class="signup__input">
            <label class="signup__input-label" for="username">Username</label>
            <input class="signup__input-field" type="text" name="username" id="username" placeholder="Your username" required>
          </div>
          <div class="signup__input">
            <label class="signup__input-label" for="fullname">Fullname</label>
            <input class="signup__input-field" type="text" name="fullname" id="fullname" placeholder="Your fullname" required>
          </div>
          <div class="signup__input">
            <label class="signup__input-label" for="email">Email</label>
            <input class="signup__input-field" type="email" name="email" id="email" placeholder="Your email" required>
          </div>
          <div class="signup__input">
            <label class="signup__input-label" for="password">Password</label>
            <input class="signup__input-field" type="password" name="password" id="password" placeholder="Enter your password at least 8 characters" minlength="8" onchange="validatePassword()" required>
          </div>
          <div class="signup__input">
            <label class="signup__input-label" for="password-confirm">Confirm Password</label>
            <input class="signup__input-field" type="password" name="password-confirm" id="password-confirm" placeholder="Confirm your password" minlength="8" onchange="validatePassword()" required>
          </div>
          <div class="signup__input">
            <input class="signup__input-btn" type="submit" name="add-account" value="Create Accout">
          </div>
        </form>
      </div>
    </div>
    
  </div>
</body>
</html>