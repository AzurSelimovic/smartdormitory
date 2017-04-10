<?php
  require("includes/connection.php");
  session_start();
  if(empty($_SESSION['username']) && empty($_SESSION['type'])) { // Program provjera da li je session postavljen(da li je korsnik prijavljen ili ne), jer se tokom uspjesnog prijavljivanja korisnika postavlja u session(username,password,type,img_url)
  }
  else  { // U slucaju da je session postavljen( korisnik prijavljen ), izvrsit ce se ovaj dio programa
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $img_url = $_SESSION['img_url']; // Zbog lakseg pisanja podatke iz sessiona pohranjujemo u nove varijable
  $type = $_SESSION['type'];
  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password'");
  }
?>
 <!DOCTYPE html> <!-- Pocetak html koda -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartDormitory | Cntrol Panel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href='css/site-layout.css' rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/2989be7a49.js"></script>

    </head>
  <body>
    <section id="navBar">
      <div class="container">
      <div class="row">
        <div class="col-md-6">
          <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="index.php">News</a></li>
              <li><a href="index.php">Gallery</a></li>
              <li><a href="index.php">Contact Us</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-md-6">
              <div align="right">
              <?php
              if(empty($_SESSION['username']) && empty($_SESSION['password'])) {
              echo "
             <button id='sr' type='button' class='btn btn-warning'>Sign In</button>
             <button id='sr' type='button' class='btn btn-warning'>Sign Up</button>";
           }else {
             echo "<h4>Hi, $username | <a href='logout.php'>Log Out</a></h4><br>
             <h5><a href='#'>Notifications</a> | <a href='#'>Control Panel</a> | <a href='#'> Settings</a><h5>
             ";
           }
           ?>
           </div>
        </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="container">
    <?php
    if(empty($_SESSION["username"]) && empty($_SESSION['password'])) { // U ovom slucaju, ako session nije postavljen, odnosno ako korisnik nije prijavljen izvrsit ce se ovaj dio koda od 64 -79. linije koda
      echo"<div class='row'>
      <div class='col-md-3'></div>
      <div class='col-md-6'>
      <div align='center'>
      <h1 style='font-size: 85px'>SmartDormitory</h1>
      </div>
      <h2>Sign In:</h2>
      <form id='login-form' action='login.php' method='post'>
        <input id='login_input' style='color: #000000' type='text' name='username' placeholder='Enter your username...'><br>
        <input id='login_input' style='color: #000000' type='password' name='password' placeholder='*********'><br>
        <input id='login-button' type='submit' value='Sign In''>
      </form></div>
      <div class='col-md-3'></div>
      </div>";
    }
    else { // U suprotnom ako je session postavljen, odnosno ako je korisnik prijavljenn izvrsit ce se dio koda od 80. - 105. linije koda
      echo "<div id='box_model_one'>
        <div id='navigation'>
          <div class='row'>
            <div class='col-md-6'>
              <h3>Control Panel</h3>
            </div>
            <div class='col-md-6'>
              <i class='fa fa-times-circle fa-2x' aria-hidden='true'></i>
              <i class='fa fa-minus-circle fa-2x' aria-hidden='true'></i>

            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-md-4'>
            <div id='personal-info'>
              <img src = '$img_url' width='200px' height='200px'>
              <h3>$username</h3>";
                if($type == 'admin') {
                  echo"<nav>
                    <ul>
                    <li><a href='#'>About Me</a></li>
                    <li><a href='#'>News Board</a></li>
                    <li><a href='#'>Create Accounts</a></li>
                    <li><a href='#'>Manage Accounts</a></li>
                    <li><a href='#'>Stats</a></li>
                    <li><a href='#'>Settings</a></li>
                    </ul>
                  </nav>";
                }
              echo"
            </div>
          </div>
          <div class='col-md-8'>
            <i class='fa fa-times-circle fa-2x' aria-hidden='true'></i>
          </div>
        </div>
      </div>";

    }
    ?>
  </div>
  </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
