<?php
  require ("includes/connection.php");

  echo "<!DOCTYPE html>
  <html>
    <head>
      <title>SmartDormitory | Login</title>
    </head>
    <body>
      <form action='login.php' method='post'>
        <p class='login_form'>Enter your username:</p><br>
        <input class='login_form' type='text' name='username' placeholder='Username or email...'><br>
        <p class='login_form'>Enter your password:</p><br>
        <input class='login_form' type='password' name='password' placeholder='*******'><br>
        <input type='submit' class='login_form' value='Login'>
      </form>
    </body>
  </html>
  ";





?>
