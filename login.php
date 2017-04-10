<?php
  require("includes/connection.php");
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $e_pass = crypt($password,'ww'); // Unesena sifra prolazi kroz funkciju crypt, odnosno funkcija enkripcije.

  $login_query = mysqli_query($conn,"SELECT username, type, password, img_url FROM users WHERE username = '$username' and password = '$e_pass'"); // $login_query pretrazuje bazu za korisnickim racunom s kojim se podudaraju uneseno korisnicko ime i sifra
  $row1 = mysqli_fetch_array($login_query); // Sve zaprimljene podatke pohranjuje u array(polje) $row1

  if($username == $row1['username'] && $e_pass == $row1['password']) { // Algoritam provjerava da li se unesena sifra podudara sa dobijenim podacima iz baze
    $_SESSION['username'] = $row1['username'];
    $_SESSION['type'] = $row1['type'];
    $_SESSION['img_url'] = $row1['img_url'];
    $_SESSION['password'] = $row1['password'];
    header("Location: index.php"); // Ako je gornji uslov ($username == $row1['username'] && $e_pass == $row1['password']) ispunjen, svi podaci se pohranjuju u tzv. sesije(session), cookies i algoritam nas preusmjerava na index.php
  }
  else {
    header("Location: failed_login.php"); // U slusaju da gornji uslov nije ispunjen, program nas presumjerava na failed_login.php
  }
?>
