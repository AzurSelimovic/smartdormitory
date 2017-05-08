<?php
    session_start();

    require('connection.php');
    if(empty($_SESSION['mUserId'])  && empty($_SESSION['password']))
        {
            header("Location: news_board.php");
        }
        else{
        if( $_SESSION['account_type'] == "student"){
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
        $sql1 = mysqli_query($conn,"SELECT * FROM bodovni_sistem WHERE userid = '$userID'");
        $suma = 0;
        echo "<!DOCTYPE html>
<html>
<head>
    <title>SmartDormitory | Dashboard</title>
	<meta charset='utf-8' />
    <link rel='shortcut icon' href='img/finlogo.png' type='image/x-icon'>
    <!-- CSS -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css' integrity='sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi' crossorigin='anonymous'>
    <link href='css/index.css' rel='stylesheet' type='text/css'>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js' integrity='sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK' crossorigin='anonymous'></script>
</head>
<body>
        <sesction id='dashboard'>
            <!--Menu-->
            <div id='left-menuBar'>
                <!-- PrfileInformationSection-->
                <div id='profile_info'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div align='center'>
                            <img src='$img_url' width='100px' height='101.5px' />
                            <h3>$firstName  $lastName</h3>
                             </div>
                        </div>
                        <div class='col-md-6'>
                           <div align='center'>
                               <button id='info' type='button' class='btn btn-warning'><a href='settings.php'>Postavke</a></button>
                               <button id='info' type='button' class='btn btn-warning'>Pomoć</button>
                               <a href='logout.php'><button id='info' type='button' class='btn btn-success'>Odjavi se</button></a>
                           </div>
                        </div>
                    </div>
                </div>
                <!-- PIS END-->
                <hr />
                <!-- NAV TABS-->
                <div id='nav-tabs'>
                    <div align='center'>
                    <a href='about.php'><button id='info' type='button' class='btn btn-info'>O $firstName $lastName<!--php_code--></button></a>
                    <a href='news_board.php'><button id='info' type='button' class='btn btn-info'>Oglasna Ploča<!--php_code--></button></a>
                    <a href='bodovni_sistem.php'><button id='info' type='button' class='btn btn-info'>Bodovni Sistem<!--php_code--></button></a>
                    <a href='subject_r.php'><button id='info' type='button' class='btn btn-info'>Ocjene<!--php_code--></button></a>
                </div>
                    </div>
                <!-- NT END-->
                <hr />
            </div>
            <!-- Menu END-->
            <div id='main'>
            <table>
            <tr><th>Ime i prezime</th>
            <th>Broj bodova</th>
            <th>Razlog</th>
            <th>Datum</th>";
            while($row1 = mysqli_fetch_array($sql1)) {
                echo"<tr><td>".$row['fname']." ".$row["lname"]."</td><td>";
                    if($row1['br_bodova']>0) {
                        echo"<p style='color: green'>".$row1['br_bodova']."</p>";
                    }
                    else {
                        echo"<p style='color:red'>".$row1['br_bodova']."</p>";
                    }
                echo"</td><td>".$row1['razlog']."</td><td>".$row1['date']."</td></tr>";
                $suma = $suma + $row1['br_bodova'];
            }
            echo"
            <tr><th>Ukupno:</th>
            <th>";

            echo $suma+100;
            echo"
            </th></tr>
            </table>
            </div>
        </sesction>
</body>
</html>
"
        ;
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
        $sname = $_POST['sname'];
        $surname = $_POST['surname'];
        $brojBodova = $_POST['points'];
        $razlog = $_POST['razlog'];

        $sql0 = mysqli_query($conn,"SELECT * FROM user WHERE fname = '$sname' and lname = '$surname'");
        $row0 = mysqli_fetch_array($sql0);
        $ssuserid = $row0['id'];
        $sql1 = "INSERT INTO bodovni_sistem (userid,br_bodova,razlog) VALUES ('$ssuserid','$brojBodova','$razlog')";
        $query1 = mysqli_query($conn,$sql1);
        $action_query=mysqli_query($conn,"INSERT INTO action_log (mUserId,action) VALUES ('$userID','User Id $userID added $brojBodova to table bodovni_sistem for id $ssuserid at')");
        header("Location: admin_sistem.php?ime=$sname&prezime=$surname");


     }
        }
?>
