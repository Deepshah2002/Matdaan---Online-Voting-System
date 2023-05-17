<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Matdaan - Online Voting</title>

    <style>
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
            <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
            <?php
            if (isset($_SESSION['username'])) {
                
                echo '<li><a href="vote.php">Vote</a></li>';
                echo '<li><a href="userlogout.php">User Logout</a></li>';
                echo "<li><a style='border-bottom:0px;'>Hi, ",$_SESSION['username'],"</a></li>";
                echo '<li><a href="contactus.php">Contact Us</a></li>';
            } else if (isset($_SESSION['admin_username'])) {
                echo '<li><a href="cpanel.php">Control Panel</a></li>';
                echo '<li><a href="adminlogout.php">Admin Logout</a></li>';
                echo "<li><a style='border-bottom:0px;'>Hi, ",$_SESSION['admin_username'],"</a></li>";
            } else {
                echo '<li><a href="userlogin.php">User Login</a></li>';
                echo '<li><a href="userregistration.php">User Registration</a></li>';
                echo '<li><a href="adminlogin.php">Admin Login</a></li>';
                echo '<li><a href="contactus.php">Contact Us</a></li>';
            }

            ?>
        </ul>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>

    <section class="intro">
        <div class="intro-text">
            <h1>Vote for your Rights!</h1>
            <p>Fast<span class="dot">.</span> Secure<span class="dot">.</span> Reliable<span class="dot">.</span></p>
            <a href="vote.php">Vote Now</a>
        </div>

        <div class="intro-img">
            <img src="./images/evm.jpg" alt="">
        </div>
    </section>
    <div class="scroll-down">
        <a href="#"><i class="ri-arrow-up-s-line"></i></a>
    </div>

    <section class="footer">
        <div class="social">
            <a href="https://www.instagram.com/ecisveep/"><i class="ri-instagram-line"></i></a>
            <a href="https://twitter.com/ECISVEEP"><i class="ri-twitter-line"></i></a>
            <a href="https://www.facebook.com/ECI/"><i class="ri-facebook-line"></i></a>
        </div>

        <ul class="">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="vote.php">Vote</a></li>';
                echo '<li><a href="contactus.php">Contact Us</a></li>';
            } else if (isset($_SESSION['admin_username'])) {
                echo '<li><a href="cpanel.php">Control panel</a></li>';
            } else {
                echo '<li><a href="userlogin.php">User Login</a></li>';
                echo '<li><a href="userregistration.php">User Registration</a></li>';
                echo '<li><a href="adminlogin.php">Admin Login</a></li>';

            }

            ?>
            <li><a href="knowyourcandidates.php">K.Y.C.</a></li>
        </ul>
        <p class="Govt">
            Matdaan is a Government of India Initiative.
        </p>
    </section>

    <script src="js/script.js"></script>
</body>

</html>