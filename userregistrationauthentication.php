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

  <title>User Registration Authentication</title>

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

      //Establish connection and assign submitted values to variables. Also, remove any special characters that maybe submitted to database
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $voter_id = mysqli_real_escape_string($conn, $_POST['voter_id']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $voter_phone = mysqli_real_escape_string($conn, $_POST['voter_phone']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
      $gender = mysqli_real_escape_string($conn, $_POST['gender']);
      
      //Encrypt using Bcrypt algorithm
      $pass = password_hash($password, PASSWORD_BCRYPT);
      $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

      //Get all values corresponding to a voter id
      $email_query = " Select * from db.tbl_users where voter_id ='$voter_id' ";
      
      //Execute query
      $query = mysqli_query($conn, $email_query);

      //Count number of rows corresponding to the voter id
      $voter_id_count = mysqli_num_rows($query);

      //If one row with provided voter id exists then do not allow to create account
      if ($voter_id_count > 0) {
        echo "<div class='title'>User Authentication Status</div>";
        echo "<span>Authentication Failed!<br></span>";
        echo "<span>Account with the following Voter ID already exists.</span>";
        echo "<center><a href='index.php' class='button'>Finish</a></center>";
      } else {

        //Check if the password and confirmpassword fields have the same values
        if ($password === $cpassword) {

          //Insert all submitted values to the database
          $insert_query = "Insert into db_evoting.tbl_users(full_name, voter_id, email, voter_phone, password, confirm_password, gender, has_voted) values('$username','$voter_id','$email','$voter_phone','$pass','$cpass','$gender','0')";

          //Execute Query
          $iquery = mysqli_query($conn, $insert_query);

          //If query is exectuted successfully provide the 'Account Created Successfully' message
          if ($iquery) {
            echo "<div class='title'>User Authentication Status</div>";
            echo "<span>Authentication Successful!<br></span>";
            echo "<span>Account Created Successfully.</span>";
            echo "<center><a href='index.php' class='button'>Finish</a></center>";
          } else {
            echo "<div class='title'>User Authentication Status</div>";
            echo "<span>Authentication Failed!<br></span>";
            echo "<span>Failed to Create Account. Try again Later.</span>";
            echo "<center><a href='userregistration.php' class='button'>Try Again</a></center>";

          }
        } else {
          echo "<div class='title'>User Authentication Status</div>";
          echo "<span>Authentication Failed!<br></span>";
          echo "<span>Passwords do not match.</span>";
          echo "<center><a href='userregistration.php' class='button'>Try Again</a></center>";
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
          echo '<li><a href="vote.php">Vote</a></li>';
          echo "<li><a style='border-bottom:0px;'>Hi, ", $_SESSION['username'], "</a></li>";
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