<!--
Owner: Deep Shah
Project Name: Deep Shah
Roll Number: 31011120067
Objective: To authenticate admin and display authentication status
Date of Submission: 21/04/2023
-->

<?php
session_start();

//Dont allow to access the page if submit button was not clicked
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

    <title>Admin Authentication</title>

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

        // If submit button was clicked, perform the actions
        if (isset($_POST['submit'])) {

            //Check if all fields were filled
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $error = "All fields are required.";
            } else {
                //Test admin input
                $admin_username = test_input($_POST['username']);
                $admin_password = test_input($_POST['password']);

                //Establish Connection
                $conn = mysqli_connect($hostname, $username, $password, $database);

                //Check connection
                if (!$conn) {
                    die("Connection Failed : " . mysqli_connect_error());
                }

                //Get all values corresponding to an admin username and admin password
                $admin_query = "SELECT * FROM db_evoting.tbl_admin WHERE admin_username='" . $admin_username . "' AND admin_password='" . $admin_password . "'";
                
                //Execute Query
                $query = mysqli_query($conn, $admin_query);

                //Count number of rows corresponding to the admin username
                $admin_count = mysqli_num_rows($query);

                //If one row with provided admin username exists then authenticate the admin
                if ($admin_count) {

                    //Fetch associative array based on the query
                    $admin_username_pass = mysqli_fetch_assoc($query);

                    //Fetch admin password from the associative array
                    $db_pass = $admin_username_pass['admin_password'];

                    //Set admin session.
                    $_SESSION['admin_username'] = $admin_username_pass['admin_username'];

                    //Check if entered pass is same as the password in the database
                    if ($db_pass == $admin_password) {
                        echo "<div class='title'>Admin Authentication Status</div>";
                        echo "<span>Authentication Successful!<br></span>";
                        echo "<span>Logged in Successfully.</span>";
                        echo "<center><a href='index.php' class='button'>Finish</a></center>";
                    } else {
                        echo "<div class='title'>Admin Authentication Status</div>";
                        echo "<span>Authentication Failed!<br></span>";
                        echo "<span>ID or Password is incorrect.</span>";
                        echo "<center><a href='adminlogin.php' class='button'>Try Again</a></center>";
                        session_destroy();
                    }
                } else {
                    echo "<div class='title'>Admin Authentication Status</div>";
                    echo "<span>Authentication Failed!<br></span>";
                    echo "<span>ID or Password is incorrect.</span>";
                    echo "<center><a href='adminlogin.php' class='button'>Try Again</a></center>";
                    session_destroy();
                }
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
                    echo '<script>window.location.replace("index.php")</script>';
                } else if (isset($_SESSION['admin_username'])) {
                    echo '<li><a href="cpanel.php">Control Panel</a></li>';
                    echo '<li><a href="adminlogout.php">Admin Logout</a></li>';
                    echo "<li><a style='border-bottom:0px;'>Hi, ", $_SESSION['admin_username'], "</a></li>";
                }
                ?>

            </ul>

            <div class="bx bx-menu" id="menu-icon"></div>
        </header>
    </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>