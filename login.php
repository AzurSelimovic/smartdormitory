<?php
  require("includes/connection.php");
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $e_pass = crypt($password,'ww');

  $login_query = mysqli_query($conn,"SELECT username, type, password, img_url FROM users WHERE username = '$username' and password = '$e_pass'");
  $row1 = mysqli_fetch_array($login_query);

  if($username == $row1['username'] && $e_pass == $row1['password']) {
    $_SESSION['username'] = $row1['username'];
    $_SESSION['type'] = $row1['type'];
    $_SESSION['img_url'] = $row1['img_url'];
    $_SESSION['password'] = $row1['password'];
    header("Location: index.php");
  }
  else {
    header("Location: failed_login.php");
  }
?>
