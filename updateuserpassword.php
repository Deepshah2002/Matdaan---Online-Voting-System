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

    <title>Update User Password</title>

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

        // If submit button was clicked, perform the actions
        if (isset($_POST['submit'])) {

            //Check if all fields were filled
            if (empty($_POST['voter_id']) || empty($_POST['oldpassword']) || empty($_POST['newpassword'])) {
                $error = "All fields are required.";
            } else {
                //Test user input
                $voter_id = test_input($_POST['voter_id']);
                $oldpassword = test_input($_POST['oldpassword']);
                $newpassword = test_input($_POST['newpassword']);

                //Establish Connection
                $conn = mysqli_connect($hostname, $username, $password, $database);

                //Check connection
                if (!$conn) {
                    die("Connection Failed : " . mysqli_connect_error());
                }

                //Get all values corresponding to a voter id
                $voter_id_search = "SELECT * FROM db_evoting.tbl_users WHERE voter_id='$voter_id'";

                //Execute Query
                $query = mysqli_query($conn, $voter_id_search);

                //Count number of rows corresponding to the voter id
                $voter_id_count = mysqli_num_rows($query);

                //If one row with provided voter id exists then authenticate the user
                if ($voter_id_count) {

                    //Fetch associative array based on the query
                    $voter_id_pass = mysqli_fetch_assoc($query);

                    //Fetch admin password from the associative array
                    $oldpass = $voter_id_pass['password'];

                    //Verify if the entered old password and the hashed password from the database are same
                    $pass_decode = password_verify($oldpassword,$oldpass);
                    
                    //If the passwords are verified then encrypt the newpassword and push it to the database
                    if($pass_decode)
                    {   $newpass = password_hash($newpassword, PASSWORD_BCRYPT);
                        $update_password_query = "Update db_evoting.tbl_users set password = '$newpass', confirm_password='$newpass' WHERE voter_id='$voter_id'";
                        mysqli_query($conn, $update_password_query);
                        echo "<div class='title'>Password Reset Status</div>";
                        echo "<span>Password has been reset successfully.<br></span>";
                        echo "<center><a href='index.php' class='button'>Finish</a></center>";
                    }
                    else {
                        echo "<div class='title'>Password Reset Status</div>";
                        echo "<span>Old Password is incorrect.<br></span>";
                        echo "<center><a href='changeuserpassword.php' class='button'>Try Again</a></center>";
    
                    }
                   
                } 
                else {
                    echo "<div class='title'>Password Reset Status</div>";
                    echo "<span>Old Password is incorrect.<br></span>";
                    echo "<center><a href='changeuserpassword.php' class='button'>Try Again</a></center>";

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