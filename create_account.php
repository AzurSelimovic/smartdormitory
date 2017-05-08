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
        echo "<!DOCTYPE html>
<html>
<head>
    <title>SmartDormitory | Dashboard</title>
    <meta charset='utf-8' />
    <link rel='shortcut icon' href='img/finlogo.png' type='image/x-icon'>
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
                   <a href='create_account.php'><button id='info' type='button' class='btn btn-info'>Kreiraj korisnički račun<!--php_code--></button></a>
                    <a href='student_list.php'><button id='info' type='button' class='btn btn-info'>Lista učenika<!--php_code--></button></a>
                    <a href='action_log.php'><button id='info' type='button' class='btn btn-info'>Action Log<!--php_code--></button></a>
                </div>
                    </div>
                <!-- NT END-->
                <hr />
            </div>
            <!-- Menu END-->
            <div id='main'>
            <form action='register.php' method='post'>
                <p>Unesite Ime:</p><br/>
                <input type='text' name='fName' required/><br/>
                <p>Unesite Prezime</p><br/>
                <input type='text' name='lName' required/><br/>
                <p>Unesite Datum rođenja:</p><br/>
                <input type='date' name='date_of_b' required/><br/>
                <p>Odaberite Šifru:</p><br/>
                <input type='password' name='user_password' required/><br/>
                <p>Odaberite vrstu korisničkog računa:</p><br/>
                Učenik<input type='radio' name='type' value='student' required/><br/>
                Administrator<input type='radio' name='type' value='admin' required/><br/>
                <input type='submit' value='Kreiraj korisnički račun'>
            </form>
            </div>
        </sesction>
</body>
</html>
"
        ;
     }
    }

?>
