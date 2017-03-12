<?php
  require('includes/connection.php');
  $check_query = mysqli_query($conn, "SELECT * FROM users");
  $username = $_POST['username'];
  $password = $_POST['password'];
  $re_password = $_POST['re-password'];
  $email = $_POST['email'];
  $type = $_POST['type'];
  while($check_row = mysqli_fetch_array($check_query)) {
    if($check_row['username'] == $username) {
      echo"Username alredy in use!";
      break;
    }
    else if($check_row['email'] == $email){
      echo"This e-mail adress is alredy in use!";
      break;
    }
    else {
      if($password == $re_password) {
        $default = "includes/default.png";
        $e_pass = crypt($password,'ww');
        $register_query = mysqli_query($conn, "INSERT INTO users (username, password, email, type, img_url) VALUES ('$username','$e_pass','$email','$type','$default')");
        break;
        if(!$register_query) {
          echo"Could't create account, try again!";
          break;
        }
      }
      else {
        echo "Choosen passwords doesn't match!";
        break;
      }
    }
  }

?>
