<?php
    session_start();

    require('connection.php');
    if(empty($_SESSION['mUserId'])  && empty($_SESSION['password']))
        {
            header("Location: login.php");
        }
        else{
        if( $_SESSION['account_type'] == "student"){
                header("Location: index.php");
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
        $img_url = $row['img_url'];
        $school_name = $row['school_name'];
        $grade = $row['grade'];
        $smjer = $row['smjer'];
        $name_ct = $row['name_ct'];
        $sometitle = $_POST['n_title'];
        $someimage = $_POST['n_image'];
        $sometext = $_POST['n_text'];
        $target_dir1="news_articles/";
        $someimage = basename($_FILES['someimage']['name']);
        $target_file = $target_dir . $img_url1;
        move_uploaded_file($_FILES['someimage']['tmp_name'], $target_file);
        
        $sql6 = "INSERT INTO news_board (news_title,news_img,news_texts) VALUES ('$sometitle','$someimage','$sometext')";
        $ress = mysqli_query($conn,$sql6);
        $action_query=mysqli_query($conn,"INSERT INTO action_log (mUserId,action) VALUES ('$userID','User Id $userID added a new post $sometitle at')");
        echo $sometitle;
        if(!$ress) {
            echo "error";
        }
        else {
            header("Location: news_board.php");
        }
    }
}
?>
