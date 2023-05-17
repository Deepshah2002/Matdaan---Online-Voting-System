<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vote Confirmation</title>

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

  //Allow to access page only if user session is started
    if (isset($_SESSION['username'])) {
      require('config.php');

      //Establish Connection
      $conn = mysqli_connect("localhost", "root", "", "db_evoting");

      //Assign session variable voter_id
      $voter_id = $_SESSION['voter_id'];

      //Get all values corresponding to a voter id
      $query = "SELECT * FROM tbl_users WHERE voter_id = '$voter_id'";

      //Execute query
      $result = mysqli_query($conn, $query);

      //Fetch associative array based on the query
      $row = mysqli_fetch_assoc($result);

      //If the user has voted, don't allow him to vote
      if ($row['has_voted'] == 1) {
        echo "<div class='title'>Vote Status</div>";
        echo "<span>You have already voted.</span>";
        echo "<center><a href='index.php' class='button'>Finish</a></center>";
      } else {

        //If the user has clicked the vote button and the vote radio button is not empty then count the vote
        if (isset($_POST["vote"]) && !empty($_POST["vote"])) {
          $vote = test_input($_POST["vote"]);
          $sql = "INSERT INTO db_evoting.tbl_vote VALUES(null,'" . $vote . "');";

          //If insert query execution is successful
          if (mysqli_query($conn, $sql)) {
            echo "<div class='title'>Vote Status</div>";
            echo "<span>You've successfully voted.</span>";
            echo "<center><a href='index.php' class='button'>Finish</a></center>";
            $voter_id = $_SESSION['voter_id'];
            $query = "Update tbl_users SET has_voted = 1 WHERE voter_id = '$voter_id'";
            mysqli_query($conn, $query);
          } else {
            echo "<div class='title'>Sorry, there was a problem casting your vote.</div>";
            echo "<center><a href='index.php' class='button'>Finish</a></center>";
          }
        } 
        //If voter doesn't select any radio button then provide warning
        else {
          echo "<div class='title'>Vote Status</div>";
          echo "<span>Please Select a Candidate to Vote.</span>";
          echo "<center><a href='vote.php' class='button'>Try again</a></center>";
        }
      }
    } else {
      echo "<span>Vote First</span>";
    }

    ?>


    <header>
      <a href="index.php" class="logo">Matdaan</a>

      <ul class="navlist">
        <li><a href="index.php">Home</a></li>
        <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="userlogout.php">User Logout</a></li>';
          echo "<li><a style='border-bottom:0px;'>Hi, ", $_SESSION['username'], "</a></li>";
        } else {
          echo '<script>window.location.replace("index.php")</script>';
        }

        ?>
      <li><a href="contactus.php">Contact Us</a></li>
      </ul>
      <div class="bx bx-menu" id="menu-icon"></div>
    </header>



  </div>
  <script src="js/script.js"></script>
</body>

</html>