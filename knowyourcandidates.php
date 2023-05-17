<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Know Your Candidates</title>

    <style>
        <?php include "css/knowyourcandidates.css"; ?>
        <?php include "css/style.css"; ?>
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
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="vote.php">Vote</a></li>';
                echo '<li><a href="userlogout.php">User Logout</a></li>';
                echo "<li><a style='border-bottom:0px;'>Hi, ",$_SESSION['username'],"</a></li>";
                echo '<li><a href="contactus.php">Contact Us</a></li>';
            } else if (isset($_SESSION['admin_username'])) {
                echo '<li><a href="cpanel.php">Control panel</a></li>';
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
    <div class="grid">
        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/Narendra Modi.png" alt="" />
                <div class="card-content">
                    <h1 class="card-header">Narendra Modi</h1>
                    <p class="card-text">
                        Narendra Damodardas Modi is the current Prime Minister of India.
                        Born in 1950 in Vadnagar, Gujarat; represents BJP.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/Rahul Gandhi.png" alt="" />
                <div class="card-content">
                    <h1 class="card-header">Rahul Gandhi</h1>
                    <p class="card-text">
                        Rahul Gandhi, born in 1970 in New Delhi, India, is a member of
                        the main opposition party, The Indian National Congress.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/Arvind Kejriwal.png" alt="" />
                <div class="card-content">
                    <h1 class="card-header">Arvind Kejriwal</h1>
                    <p class="card-text">
                        Arvind Kejriwal is an activist, serving
                        as the Current Chief Minister of Delhi. He was born in 1968 in Haryana, India.
                    </p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <div class="card">
                <img class="card-img" src="images/NOTA.png" alt="" />
                <div class="card-content">
                    <h1 class="card-header">NOTA</h1>
                    <p class="card-text">
                        NOTA is an option for voters, those who don't
                        have confidence in any of the currently electing candidates.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>