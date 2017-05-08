<?php
    session_start();

    require('connection.php');
     if(empty($_SESSION['mUserId'])  && empty($_SESSION['password']))
        {
            header("Location: login.php");
        } else {
        $school_name = $_POST['school_name'];
        $grade = $_POST['grade'];
        $smjer = $_POST['smjer'];
        $name_ct = $_POST['name_ct'];
        $userID = $_SESSION['mUserId'];
        $password = $_SESSION['password'];
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE id = '$userID' and password = '$password'");
        $row = mysqli_fetch_array($sql);
        
        if($school_name != NULL && $school_name != $row['school_name']) {
                $ssname = "UPDATE user SET school_name = '$school_name' WHERE id = '$userID'";
                mysqli_query($conn,$ssname);
            }
        if($grade != NULL && $grade != $row['grade']) {
                $sgrade = "UPDATE user SET grade = '$grade' WHERE id = '$userID'";
                mysqli_query($conn,$sgrade);
            }
        if($smjer != NULL && $smjer != $row['smjer']) {
                $ssmjer = "UPDATE user SET smjer = '$smjer' WHERE id = '$userID'";
                mysqli_query($conn,$ssmjer);
            }
        if($name_ct != NULL && $name_ct != $row['name_ct']) {
                $sname_ct = "UPDATE user SET name_ct = '$name_ct' WHERE id = '$userID'";
                mysqli_query($conn,$sname_ct);
            }
        header("Location: index.php");
        }
        

?>