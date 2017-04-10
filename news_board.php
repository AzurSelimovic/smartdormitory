<?php
  require("includes/connection.php");
  session_start();
  if(empty($_SESSION['username']) && empty($_SESSION['type'])) {  // Program provjera da li je session postavljen(da li je korsnik prijavljen ili ne), jer se tokom uspjesnog prijavljivanja korisnika postavlja u session(username,password,type,img_url)
  }
  else  { // U slucaju da je session postavljen( korisnik prijavljen ), izvrsit ce se ovaj dio programa
  $username = $_SESSION['username'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $img_url = $_SESSION['img_url'];
  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password'");
  }
?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartDormitory | Index</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href='css/site-layout.css' rel="stylesheet" type="text/css">
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
             <a href='register_page.php'><button id='sr' type='button' class='btn btn-warning'>Sign Up</button></a>";
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
    if(empty($_SESSION["username"]) && empty($_SESSION['password'])) { // U suprotnom ako je session postavljen, odnosno ako je korisnik prijavljenn izvrsit ce se dio koda od 63. - 76. linije koda
      echo"";
          $sql1 = mysqli_query($conn,"SELECT * FROM news_board ORDER BY id DESC");
         while( $row1=mysqli_fetch_array($sql1)){
                echo"
                <div id='news_box'>
                    <div align='center'>
                    <img class='news_img' src=".$row1['news_img']." align='middle'>
                    </div>
                    <h4 class='news_header'>".$row1['news_header']."</h4>
                    <hr/>
                    <p class='article_text'>".$row1['article_text']."</p>
                    </div>";
                }
                echo "";
    }
    else {
      echo"
      <h3>Members list:</h3><table>
            <tr><th>-</th><th>Username </th><th>E-mail</th><th>See more</th></tr>
                    ";
                    $sql1 =mysqli_query($conn,"SELECT * FROM users WHERE type=''");
                    $brojac = 0;
                    while($row1 = mysqli_fetch_array($sql1)){
                        $brojac = $brojac + 1 ;
                        echo "<tr><td>".$brojac ."</td><td>". $row1['username'] ."</td><td>". $row1['email']."</td><td><button type='button' class='btn btn-info'>Manage</button></a></td></tr>";
                    }
            echo"
            </table>";
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