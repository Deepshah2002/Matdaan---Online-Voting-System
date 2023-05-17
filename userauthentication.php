<?php

//Dont allow to access the page if submit button was not clicked
session_start();
if (!isset($_POST['submit'])) {
    echo '<script>window.location.replace("index.php");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Authentication</title>

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

        include 'config.php';

        //Allow to access page only if submit button was clicked
        if (isset($_POST['submit'])) {

            //Assign submitted values to variables
            $voter_id = $_POST['voter_id'];
            $password = $_POST['password'];

            //Get all values corresponding to a voter id
            $voter_id_search = "Select * from tbl_users where voter_id = '$voter_id'";
            
            //Execute query
            $query = mysqli_query($conn, $voter_id_search);

            //Count number of rows corresponding to the voter id
            $voter_id_count = mysqli_num_rows($query);

            //If one row with provided voter id exists then authenticate the user
            if ($voter_id_count) {

                //Fetch associative array based on the query
                $voter_id_pass = mysqli_fetch_assoc($query);

                //Fetch admin password from the associative array
                $db_pass = $voter_id_pass['password'];

                //Set user session.
                $_SESSION['username'] = $voter_id_pass['full_name'];
                $_SESSION['voter_id'] = $voter_id_pass['voter_id'];

                //Verify if the entered old password and the hashed password from the database are same
                $pass_decode = password_verify($password, $db_pass);

                //If the passwords are verified then encrypt the newpassword and push it to the database
                if ($pass_decode) {
                    echo "<div class='title'>User Authentication Status</div>";
                    echo "<span>Authentication Successful!<br></span>";
                    echo "<span>Logged in Successfully.</span>";
                    echo "<center><a href='index.php' class='button'>Finish</a></center>";
                } else {
                    echo "<div class='title'>User Authentication Status</div>";
                    echo "<span>Authentication Failed!<br></span>";
                    echo "<span>ID or Password is incorrect.</span>";
                    echo "<center><a href='userlogin.php' class='button'>Try Again</a></center>";
                    session_destroy();
                }
            } else {
                echo "<div class='title'>User Authentication Status</div>";
                echo "<span>Authentication Failed!<br></span>";
                echo "<span>ID or Password is incorrect.</span>";
                echo "<center><a href='userlogin.php' class='button'>Try Again</a></center>";
                session_destroy();
            }

        }

        ?>

        <header>
            <a href="index.php" class="logo">Matdaan</a>

            <ul class="navlist">
                <li><a href="index.php">Home</a></li>
                <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="vote.php">Vote</a></li>';
                    echo "<li><a style='border-bottom:0px;'>Hi, ",$_SESSION['username'],"</a></li>";
                }
                ?>
            <li><a href="contactus.php">Contact Us</a></li>
            </ul>

            <div class="bx bx-menu" id="menu-icon"></div>
        </header>
    </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>