<?php 
    session_start();
    require('connection.php');

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $user_img = $_POST['user_img'];
    
        $userID = $_SESSION['mUserId'];
        $password = $_SESSION['password'];
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE id = '$userID' and password = '$password'");
        $row = mysqli_fetch_array($sql);
        $firstName = $row['fname'];
        $lastName = $row['lname'];
         
        if($ime != NULL && $ime != $firstName) {
                $sime = "UPDATE user SET fname = '$ime' WHERE id = '$userID'";
                mysqli_query($conn,$sime);
            }
         if($prezime != NULL && $prezime != $lastName) {
                $sprezime = "UPDATE user SET lname = '$prezime' WHERE id = '$userID'";
                mysqli_query($conn,$sprezime);
            }
         if($email != NULL && $email != $row['email']) {
                $semail = "UPDATE user SET email = '$email' WHERE id = '$userID'";
                mysqli_query($conn,$semail);
            }
         if($pass1 != NULL && $pass1 != $row['password']) {
                $spassword = "UPDATE user SET password = '$pass1' WHERE id = '$userID'";
                mysqli_query($conn,$spassword);
            }
         if($user_img!= NULL && $user_img != $row['img_url']) {
                $simage = "UPDATE user SET img_url = '$user_img' WHERE id = '$userID'";
                mysqli_query($conn,$simage);
            }
        header("Location: index.php");


?>
