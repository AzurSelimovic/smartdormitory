<?php
  require('includes/connection.php');
  echo"<!DOCTYPE html>
  <html>
    <head>
      <title>SmartDormitory | Register</title>
    </head>
    <body>
      <form action='register.php' method='post'>
        <p class='login_form'>Username:</p><br>
        <input class='login_form' type='text' name='username' placeholder='Username...'><br>
        <p class='login_form'>Password:</p><br>
        <input class='login_form' type='password' name='password' placeholder='*******'><br>
        <p class='login_form'>Re-enter your password:</p><br>
        <input class='login_form' type='password' name='re-password' placeholder='*******''><br>
        <p class='login_form'>Enter your e-mail:</p><br>
        <input class='login_form' type='email' name='email' placeholder='some@example.com'><br>
        <p class='login_form'>Choose your account type:</p><br>
        Student<input class='login_form' type='radio' name='type' value='student' checked><br>
        Parent<input class='login_form' type='radio' name='type' value='parent'><br>
        Administrator<input class='login_form' type='radio' name='type' value='admin'><br>
        <input type='submit' class='login_form' value='Register'>
      </form>
    </body>
  </html>";
?>
