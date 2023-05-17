<?php

//Credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_evoting";

//Establish Connection
$conn = mysqli_connect($hostname, $username, $password, $database);

//Check Connection
if (!$conn) {
  ?>
  <script>
    alert("Connection Unsuccessful.");
  </script>

  <?php
}

// UserInput Test
function test_input($data)
{
  //Remove whitespace
  $data = trim($data);

  //Remove trailing backspace
  $data = stripslashes($data);

  //Remove trailing specialcharacters
  $data = htmlspecialchars($data);

  return $data;
}

?>