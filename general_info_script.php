<?php
    session_start();
    require('connection.php');
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $family_members = $_POST['family_members'];
    $fJob= $_POST['fJob'];
    $mJob = $_POST['mJOb'];
    $school_name = $_POST['school_name'];
    $uso = $_POST['uso'];
    $grade = $_POST['grade'];
    $dosijeUcenika = $_POST['dosijeUcenika'];
    $target_dir="img/";
    $target_dir1="personalDocs/";
    $img_url1 = basename($_FILES['img_url']['name']);
    $target_file = $target_dir . $img_url1;
    move_uploaded_file($_FILES['img_url']['tmp_name'], $target_file);
    $dosijeUcenika1=basename($_FILES["dosijeUcenika"]["name"]);
    $target_file1 = $target_dir1 . $dosijeUcenika1;
    move_uploaded_file($_FILES["dosijeUcenika"]["tmp_name"], $target_file1);
    $currentUserfName = $_SESSION['current_user_fName'];
    $currentUserlName = $_SESSION['current_user_lName'];
                $sql = "UPDATE user SET fatherName ='$fatherName',motherName='$motherName',family_members = '$family_members',fJob='$fJob',mJob='$mJob',school_name = '$school_name',uso = '$uso',grade='$grade',dosijeUcenika='$dosijeUcenike1', img_url='$img_url1' WHERE fname = '$currentUserfName' and lname='$currentUserlName'";
                mysqli_query($conn,$sql);
                $row = mysqli_query($conn,"SELECT id FROM user WHERE email = '$email' and password = '$pass1'");
                $ar = mysqli_fetch_array($row);
                mail($email,"MTS | Registration id",$ar['id']);
                header("Location: general_information.php");
                unset($_SESSION['current_user_fName']);
                unset($_SESSION['current_user_lName']);
                header("Location: index.php");
                ?>