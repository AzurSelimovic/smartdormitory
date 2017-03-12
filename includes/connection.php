<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $db_name = "smartd";
  $conn = mysqli_connect($hostname,$username,$password,$db_name);

  if(!$conn) {
    echo "Could't connect to database!";
  }
?>
