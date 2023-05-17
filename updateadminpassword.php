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

    <title>Update Admin Password</title>

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
        require('config.php');
        //Allow to access page only if submit button was clicked
        if (isset($_POST['submit'])) {

            //If admin username and admin password fields are not filled, then give an error
            if (empty($_POST['admin_username']) || empty($_POST['oldpassword']) || empty($_POST['newpassword'])) {
                $error = "All fields are required.";
                echo $error;
            } else {

                //Test admin input
                $admin_username = test_input($_POST['admin_username']);
                $oldpassword = test_input($_POST['oldpassword']);
                $newpassword = test_input($_POST['newpassword']);

                //Establish Connection
                $conn = mysqli_connect($hostname, $username, $password, $database);

                //Check Connection
                if (!$conn) {
                    die("Connection Failed : " . mysqli_connect_error());
                }

                //Get all values corresponding to an admin username
                $admin_username_search = "SELECT * FROM db_evoting.tbl_admin WHERE admin_username='$admin_username'";
                
                //Execture query
                $query = mysqli_query($conn, $admin_username_search);

                //Count number of rows corresponding to the admin username
                $admin_username_count = mysqli_num_rows($query);

                //If one row with provided admin username exists then authenticate the admin
                if ($admin_username_count) {

                    //Fetch associative array based on the query
                    $admin_username_pass = mysqli_fetch_assoc($query);

                    //Fetch admin password from the associative array
                    $oldpass = $admin_username_pass['admin_password'];
                    
                    //Check if entered old pass is same as the old password from the database
                    if($oldpassword == $oldpass)
                    { 
                        $update_password_query = "Update db_evoting.tbl_admin set admin_password = '$newpassword' WHERE admin_username='$admin_username'";
                        mysqli_query($conn, $update_password_query);
                        echo "<div class='title'>Password Reset Status</div>";
                        echo "<span>Password has been reset successfully.<br></span>";
                        echo "<center><a href='index.php' class='button'>Finish</a></center>";
                    }
                    else {
                        echo "<div class='title'>Password Reset Status</div>";
                        echo "<span>Old Password is incorrect.<br></span>";
                        echo "<center><a href='changeadminpassword.php' class='button'>Try Again</a></center>";
    
                    }
                   
                } 
                else {
                    echo "<div class='title'>Password Reset Status</div>";
                    echo "<span>Old Password is incorrect.<br></span>";
                    echo "<center><a href='changeadminpassword.php' class='button'>Try Again</a></center>";

                }
            }
    }
        ?>


    </div>
    <header>
        <a href="index.php" class="logo">Matdaan</a>

        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<script>window.location.replace("index.php")</script>';
            } else if (isset($_SESSION['admin_username'])) {
                echo '<script>window.location.replace("index.php")</script>';
            }
            else
            {
                echo '<li><a href="vote.php">Vote</a></li>';
                echo '<li><a href="userlogin.php">User Login</a></li>';
                echo '<li><a href="adminlogin.php">Admin Login</a></li>';

            }
            ?>
        <li><a href="contactus.php">Contact Us</a></li>
        </ul>

        <div class="bx bx-menu" id="menu-icon"></div>
    </header>    
    <script src="js/script.js"></script>
</body>

</html>