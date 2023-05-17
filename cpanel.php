<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Control Panel</title>

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
      <li><a href="knowyourcandidates.php">Know Your Candidates</a></li>
      <?php
      if (isset($_SESSION['username'])) {
        echo '<script>window.location.replace("index.php")</script>';
      } else if (isset($_SESSION['admin_username'])) {
        echo '<li><a href="adminlogout.php">Admin Logout</a></li>';
        echo "<li><a style='border-bottom:0px;'>Hi, ",$_SESSION['admin_username'],"</a></li>";
      } else {
        echo '<script>window.location.replace("adminlogin.php")</script>';
      }

      ?>

    </ul>

    <div class="bx bx-menu" id="menu-icon"></div>
  </header>

  <div class="container">
    <div class="title">Control Panel</div>
    <div class="content">
      <?php
      require 'config.php';

      //Initialize candidate variables
      $BJP = 0;
      $Congress = 0;
      $AAP = 0;
      $NOTA = 0;

      //Establish Connection
      $conn = mysqli_connect($hostname, $username, $password, $database);

      //Check Connection
      if (!$conn) {
        echo "Error While Connecting.";
      } else {

        //Select all values from tbl_vote corresponding to the 'voted_for' reflects a specific radio button value
        //BJP
        $sql = "SELECT * FROM tbl_vote WHERE voted_for='BJP'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            if ($row['voted_for'])
              $BJP++;
          }

          $bjp_value = $BJP * 10;

          echo "BJP<br>";
          echo "
                                <div class='progress'>
                                  <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow=\"$bjp_value\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $bjp_value . "%'>
                                    $BJP
                                  </div>
                                </div>
                                ";
        }

        // CONGRESS
        $sql = "SELECT * FROM tbl_vote WHERE voted_for='Congress'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            if ($row['voted_for'])
              $Congress++;
          }


          $congress_value = $Congress * 10;

          echo "Congress (INC)";
          echo "
                                <div class='progress'>
                                  <div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $congress_value . "%'>
                                    $Congress
                                  </div>
                                </div>
                                ";
        }

        // AAP
        $sql = "SELECT * FROM tbl_vote WHERE voted_for='AAP'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            if ($row['voted_for'])
              $AAP++;
          }


          $aap_value = $AAP * 10;

          echo "Aam Aadmi Party (AAP)<br>";
          echo "
                                <div class='progress'>
                                  <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $aap_value . "%'>
                                    $AAP
                                  </div>
                                </div>
                                ";
        }

        // NOTA
        $sql = "SELECT * FROM tbl_vote WHERE voted_for='NOTA'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            if ($row['voted_for'])
              $NOTA++;
          }


          $nota_value = $NOTA * 10;

          echo "None Of The Above (NOTA)<br>";
          echo "
                                <div class='progress'>
                                  <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: " . $nota_value . "%'>
                                    $NOTA
                                  </div>
                                </div>
                                ";
        }

        echo "<hr>";

        $total = 0;

        // Total
        $sql = "SELECT * FROM tbl_vote";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            if ($row['voted_for'])
              $total++;
          }

          echo "Total Votes: $total<br>";

        }

      }
      ?>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>

</html>