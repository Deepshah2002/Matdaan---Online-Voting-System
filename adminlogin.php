<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Login</title>

  <style>
    <?php include "css/vote.css" ?>
    <?php include "css/style.css" ?>
  </style>

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>

  <header>
    <a href="index.php" class="logo">Matdaan</a>

    <ul class="navlist">
      <li><a href="index.php">Home</a></li>
      <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>

      <?php
      if (isset($_SESSION['admin_username'])) {
        echo '<script>window.location.replace("index.php")</script>';
      } else if (isset($_SESSION['username'])) {
        echo '<script>window.location.replace("index.php")</script>';
      }
      else
      {
        echo '<li><a href="userlogin.php">User Login</a></li>';
        echo '<li><a href="userregistration.php">User Registration</a></li>';
      }

      ?>
    </ul>

    <div class="bx bx-menu" id="menu-icon"></div>
  </header>
  <div class="container">
    <div class="title">Admin Login</div>
    <div class="content">
      <form action="adminauthentication.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username <span class = "asterisk">*</span></span>
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="input-box">
            <span class="details">Password <span class = "asterisk">*</span></span>
            <input type="password" name="password" placeholder="Password" pattern = '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' title="Password must contain at least one number,one letter, and at least 8 or more characters." required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Sign In">
        </div>
        <p style="margin-top:10px; text-align:center;">Forgot Password? <a name="forgotpassword" class="button" href="changeadminpassword.php?reset=1">Reset Here</a></p>
      </form>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>