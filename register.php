<?php
  require('includes/connection.php');
  $username = $_POST['username']; //Prikupljanje unesenih podataka iz forme kreirane u register_page.php, metodom POST($_POST['username'],$_POST['password']...)
  $password = $_POST['password'];
  $re_password = $_POST['re-password'];
  $email = $_POST['email'];
  $type = $_POST['type'];
  $check_query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'"); // $check_query pretrazuje bazu u slucaju da ima vec neki korisnik registrovan pod istim korisnickim imenom
  $check_row = mysqli_fetch_array($check_query);
    if($check_row['username'] == $username) { // U slucaju da se korisnik pokusava registrovati sa vec registrovanim korisnickim imenom, ispisuje mu se poruka "Username alredy in use!"
      echo"Username alredy in use!";
    }
    else if($check_row['email'] == $email){ // U slucju da se korisnik pokusava registrovati sa vec registrovanom e-mail adresom, ispusuje mu se poruka "This e-mail adress is alredy in use!"
      echo"This e-mail adress is alredy in use!";
    }
    else { // I na kraju naseg algoritma autentifikacije, program provjerava da li podaduraju sifre koje je korisnik unio
      if($password == $re_password) { // Ako se sifre podudaraju, i svi gornji uslovi su ispunjeni, odnodno u ovom slucaju nisu korisnik se uspjesno registruje
        $default = "includes/default.png";
        $e_pass = crypt($password,'ww');
        $register_query = mysqli_query($conn, "INSERT INTO users (username, password, email, type, img_url) VALUES ('$username','$e_pass','$email','$type','$default')");
        header("Location: index.php");
        if(!$register_query) {
          echo"Could't create account, try again!";
        }
      }
      else {
        echo "Choosen passwords doesn't match!";
      }
    }

?>
