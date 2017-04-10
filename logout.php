<?php
  session_start();
  session_destroy(); // Unistavanje sessiona koji se vezuje za trenutnok korisnika
  header("Location: index.php");

?>
