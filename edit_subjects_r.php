<?php
    session_start();

    require('connection.php');
    if(empty($_SESSION['mUserId'])  && empty($_SESSION['password']))
        {
            header("Location: login.php");
        }
        else{
        if( $_SESSION['account_type'] == "student"){
        header("Location: news_board.php");
    }
    else if ($_SESSION['account_type'] == "admin") { 
        $userID = $_SESSION['mUserId'];
        $password = $_SESSION['password'];
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE id = '$userID' and password = '$password'");
        $row = mysqli_fetch_array($sql);
        $firstName = $row['fname'];
        $lastName = $row['lname'];
        $_SESSION['fname'] = $firstName;
        $_SESSION['lname'] = $lastName;
        $_SESSION['img_url'] = $row['img_url'];
        $img_url0 = $row['img_url'];
        $img_url = "img/" . $img_url0;
        $targetid = $_SESSION['targetid'];
        $subject_name = $_POST['subject_name'];
        $subject_edit =$_POST['subject_edit'];
        $sql01 = mysqli_query($conn,"SELECT * FROM user WHERE id = '$targetid'");
        $row01 = mysqli_fetch_array($sql01);
        $sql0 = mysqli_query($conn,"SELECT * FROM subjects WHERE mUserId = '$targetid'");
        $row0 = mysqli_fetch_array($sql0);
        $linkName = $row01['fname'];
        $linkSurname = $row01['lname'];
        if($row0['subjectName'] == $subject_name){
            $sql1 = mysqli_query($conn,"UPDATE subjects SET mark = '$subject_edit' WHERE mUserId = '$targetid' and subjectName = '$subject_name'");
            header("Location: admin_subject.php?ime=$linkName&prezime=$linkSurname");
        }
        else {
            $sql2 = mysqli_query($conn,"INSERT INTO subjects (mUserId,subjectName,mark) VALUES ('$targetid','$subject_name','$subject_edit')");
            header("Location: admin_subject.php?ime=$linkName&prezime=$linkSurname");
        }
        $action_query=mysqli_query($conn,"INSERT INTO action_log (mUserId,action) VALUES ('$userID','User Id $userID changed input in table -subjects- for id $targetid to $subject_edit for $subject_name at')");
        unset($_SESSION['targetid']); 
        unset($_SESSION['targetfName']);
        unset($_SESSION['targetLname']);
        

     }
        }
?>