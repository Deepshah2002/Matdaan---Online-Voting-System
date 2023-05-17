<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>User Registration</title>

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
      <li><a href="vote.php">Vote</a></li>
      <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
      <?php
      if (isset($_SESSION['username'])) {
        echo '<script>window.location.replace("index.php")</script>';
      } else if (isset($_SESSION['admin_username'])) {
        echo '<script>window.location.replace("index.php")</script>';
      } else {
        echo '<li><a href="userlogin.php">User Login</a></li>';
        echo '<li><a href="adminlogin.php">Admin Login</a></li>';
      }

      ?>
    <li><a href="contactus.php">Contact Us</a></li>
    </ul>

    <div class="bx bx-menu" id="menu-icon"></div>
  </header>
  <div class="container">
    <div class="title">User Registration</div>
    <div class="content">
      <form action="userregistrationauthentication.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name <span class = "asterisk">*</span></span>
            <input type="text" name="username" placeholder="Enter your Full name" required>
          </div>
          <div class="input-box">
            <span class="details">Voter ID <span class = "asterisk">*</span></span>
            <input type="text" name="voter_id" placeholder="Enter your Voter ID" pattern="^\d{10}" required>
          </div>
          <div class="input-box">
            <span class="details">Email <span class = "asterisk">*</span></span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number <span class = "asterisk">*</span></span>
            <input type="text" name="voter_phone" placeholder="Enter your number" pattern="^\d{10}$" required>
          </div>
          <div class="input-box">
            <span class="details">Password <span class = "asterisk">*</span></span>
            <input type="password" name="password" placeholder="Password" pattern = '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' title="Password must contain at least one number,one letter, and at least 8 or more characters." required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password <span class = "asterisk">*</span></span>
            <input type="password" name="cpassword" placeholder="Confirm Password" pattern = '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' title="Password must contain at least one number,one letter, and at least 8 or more characters." required>
          </div>

        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
          <span class="gender-title">Gender <span class = "asterisk">*</span></span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Create Account">
        </div>
        <p style="margin-top:10px; text-align:center;">Have an account? <a href="userlogin.php" class="button">Log in</a>
        </p>
      </form>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>