<?php
    session_start();
    require('connection.php');
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['date_of_b'];
    $pass1 = $_POST['user_password'];
    $type = $_POST['type'];
    $date_of_b = $_POST['date_of_b'];
    $img = 'img/47199326-profile-pictures.png';
    $_SESSION['current_user_fName'] = $fName;
    $_SESSION['current_user_lName'] = $lName;
    $userID = $_SESSION['mUserId'];

    if($fName != NULL && $lName != NULL && $pass1 != NULL && $type != NULL) {
                $sql = "INSERT INTO user (fname,lname,password,type,img_url,date_b) VALUES ('$fName','$lName','$pass1','$type','$img','$date_of_b')";
                mysqli_query($conn,$sql);
                $row = mysqli_query($conn,"SELECT id FROM user WHERE email = '$email' and password = '$pass1'");
                $ar = mysqli_fetch_array($row);
                $action_query=mysqli_query($conn,"INSERT INTO action_log (mUserId,action) VALUES ('$userID','User Id $userID created account $fName $lName at')");
                mail($email,"MTS | Registration id",$ar['id']);
                header("Location: general_information.php");
            }
        else {
                    echo"<p>All fields are required!</p>";
                }
?>