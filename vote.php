<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Vote</title>

  <style>
    <?php include "css/vote.css" ?>
    <?php include "css/style.css" ?>

    /* Do no display any radio button or is text if no drop down value is selected */
    .vdot,
    #BJP,
    #AAP,
    #Congress,
    #NOTA {
      display: none;
    }
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
        echo '<li><a href="userlogout.php">User Logout</a></li>';
        echo "<li><a style='border-bottom:0px;'>Hi, ", $_SESSION['username'], "</a></li>";
      } else if (isset($_SESSION['admin_username'])) {
        echo '<script>window.location.replace("index.php")</script>';
      } else {
        echo '<script>alert("Please login to Vote.");</script>';
        echo '<script>window.location.replace("userlogin.php")</script>';
      }

      ?>
    <li><a href="contactus.php">Contact Us</a></li>
    </ul>

    <div class="bx bx-menu" id="menu-icon"></div>
  </header>
  <div class="container">
    <div class="title">Choose Your Candidate</div>
    <div class="content">
      <form action="saveVote.php" method="POST">

        <div class="vote-details">

        <!-- State Drop Down -->
          <select class="votedropdown" id="statedropdown" onchange="updateDistrictDropdown()">
            <option value="Select a State">Select a State</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Delhi">Delhi</option>
            <option value="Kolkata">Kolkata</option>
          </select>

          <!-- District Drop Down -->
          <select class="votedropdown" id="districtdropdown" onchange="changeText()">
            <option value="Select a District">Select a District</option>
            <option value="Mumbai">Kurla</option>
            <option value="Mumbai">Thane</option>
            <option value="Mumbai">New Delhi</option>
            <option value="Mumbai">South Delhi</option>
            <option value="Mumbai">Bhabnipur</option>
            <option value="Mumbai">Rashbehari</option>

            <!-- Display only the values corresponding the value selected in state drop down, else display no value -->
            <script>
              var districtDropdown = document.getElementById("districtdropdown");

              for (var i = 1; i < districtDropdown.options.length; i++) {
                districtDropdown.options[i].style.display = "none";
              }
            </script>

          </select>
          <input type="radio" name="vote" id="vdot-1" value="BJP">
          <input type="radio" name="vote" id="vdot-2" value="Congress">
          <input type="radio" name="vote" id="vdot-3" value="AAP">
          <input type="radio" name="vote" id="vdot-4" value="NOTA">
          <div class="category">
            <label for="vdot-1">
              <span class="vdot one"></span>
              <span id="BJP" class="vote">BJP</span>
            </label>
            <label for="vdot-2">
              <span class="vdot two"></span>
              <span id="Congress" class="vote">Congress</span>
            </label>
            <label for="vdot-3">
              <span class="vdot three"></span>
              <span id="AAP" class="vote">AAP</span>
            </label>
            <label for="vdot-4">
              <span class="vdot four"></span>
              <span id="NOTA" class="vote">NOTA</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Vote">
        </div>
      </form>
    </div>
  </div>


  <script src="js/vote.js"></script>
  <script src="js/script.js"></script>
</body>

</html>