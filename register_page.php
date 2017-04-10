<?php
  require('includes/connection.php');
  echo"<!DOCTYPE html>
  <html>
    <head>
      <title>SmartDormitory | Register</title>
      <!-- Bootstrap -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
      <link href='css/site-layout.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
      <div class='row'>
      <div class='col-md-3'></div>
      <div class='col-md-6'>
      <div align='center'>
      <h1 style='font-size: 85px'>SmartDormitory</h1>
      </div>
      <h2>Register:</h2>
      <hr>
      <form id='login-form' action='register.php' method='post'>
        <input class='login_input' type='text' name='username' placeholder='Username...'><br>
        <input class='login_input' type='password' name='password' placeholder='*******'><br>
        <input class='login_input' type='password' name='re-password' placeholder='*******''><br>
        <input class='login_input' type='email' name='email' placeholder='some@example.com'><br>
        <input id='login-button' type='submit' value='Sign Up'><br>
        Administrator<input name='type' type='radio' value='admin'><br>
        Student<input name='type' type='radio' value='student'><br>
        Parent<input type='radio' name='type' value='parent'><br>
        <div align='center'>
        <p><a href='index.php'>Alredy have an account?</a></p>
        </div>
        </form></div>
      <div class='col-md-3'></div>
      </div>
      </form>
    </body>
  </html>";
?>
