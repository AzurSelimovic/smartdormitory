<?php 
    session_start();
    require('connection.php');
    $mUserId = $_POST['mUserId'];
    $password = $_POST['password'];
    
    if($mUserId != NULL && $password != NULL) {
        $query = mysqli_query($conn,"SELECT * FROM user WHERE id = '$mUserId' and password = '$password'");
        $row = mysqli_fetch_array($query);
        if($row['id'] == $mUserId && $row['password'] == $password) {
            $_SESSION['mUserId'] = $row['id'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['account_type'] = $row['type'];
            $action_query=mysqli_query($conn,"INSERT INTO action_log (mUserId,action) VALUES ('$mUserId','User Id $mUserId logged in at')");
            header('Location: index.php');
        }
        else {
            echo"<p style='color: red'>Šifra se ne poklapa sa korisničkim id-om!</p>";
        }
       
    }
     else {
            echo"<p style='color: red'>Šifra se ne poklap sa korisničkim id-om!</p>";
            }
?>