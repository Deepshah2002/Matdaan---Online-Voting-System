<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>

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

  <div class="container">
    <?php
        echo "<div class='title'>Contact Us</div>";
        echo "<span class = 'details'>Phone Number: +91 1023456789</span><br>";
        echo "<span class='details'>Email: Matdaan@ec.gov</span><br>";
        echo '<a href="https://www.instagram.com/ecisveep/"><i class="ri-instagram-line"></i></a>&nbsp;';
        echo '<a href="https://twitter.com/ECISVEEP"><i class="ri-twitter-line"></i></a>';
        echo '<a href="https://www.facebook.com/ECI/"><i class="ri-facebook-line"></i></a>';

     ?>


    <header>
      <a href="index.php" class="logo">Matdaan</a>

      <ul class="navlist">
        <li><a href="index.php">Home</a></li>
        <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
        <?php 
        if(isset($_SESSION['username']))
        {
          echo '<li><a href="vote.php">Vote</a></li>';
          
        }
        else if(isset($_SESSION['admin_username']))
        {
          echo '<script>window.location.replace("index.php")</script>';
        }
        else{
          echo '<li><a href="userregistration.php">User Registration</a></li>';
          echo '<li><a href="userlogin.php">User Login</a></li>';
          echo '<li><a href="adminlogin.php">Admin Login</a></li>';

        }

        ?>
      </ul>
      <div class="bx bx-menu" id="menu-icon"></div>
    </header>



  </div>
  <script src="js/script.js"></script>
</body>

</html>