<?php
    session_start();

    require('connection.php');
     if(empty($_SESSION['mUserId'])  && empty($_SESSION['password']))
        {
            header("Location: login.php");
        } else {
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
        $email = $row['email'];
        $school_name = $row['school_name'];
        $grade = $row['grade'];
        $smjer = $row['smjer'];
        $name_ct = $row['name_ct'];


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
                            <img src='$img_url' width='100px' height='101.5px'/>
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
                    <button id='info' type='button' class='btn btn-info'><a href='about.php'>O $firstName $lastName</a><!--php_code--></button>
                    <button id='info' type='button' class='btn btn-info'><a href='news_board.php'>Oglasna Ploča<!--php_code--></a></button>
                    <button id='info' type='button' class='btn btn-info'><a href='bodovni_sistem.php'>Bodovni Sistem<!--php_code--></a></a></button>
                    <button id='info' type='button' class='btn btn-info'><a href='subject_r.php'>Ocjene<!--php_code--></a></button>
                </div>
                    </div>
                <!-- NT END-->
                <hr />
            </div>
            <!-- Menu END-->
             <!-- Main Content Section -->
            <div id='main'>
                 <div class='row'>
                    <div class='col-md-6'>
                <form action='settings_p.php' method='post'>
                    <h3>Profil:</h3>
                    <hr/>
                    <p>Ime:</p><br />
                    <input type='text' name='ime' placeholder='$firstName' /><br />
                    <p>Prezime</p><br />
                    <input type='text' name='prezime' placeholder='$lastName' /><br />
                    <p>E-mail:</p><br />
                    <input type='email' name='email' placeholder='$email' /><br />
                    <p>Promijeni šifru:</p>
                    <input type='password' name='pass1' placeholder='*******' /><br />
                    <p>Slika profila:</p><br />
                    <input type='text' name='user_img' placeholder='Zalijepi ovdje link slike...' /><br />
                    <input type='submit' value='Sačuvaj promjene' />
                </form>
                 </div>
                        <div class='col-md-6'>
                            <form action='r_general.php' method='post'>
                            <h3>Općenito:</h3>
                            <hr />
                            <p>Naziv škole:</p><br />
                            <input type='text' name='school_name' placeholder='$school_name' /><br />
                            <p>Razred:</p>
                            <input type='text' name='grade' placeholder='$grade' /><br />
                            <p>Smjer:</p><br />
                            <input type='text' name='smjer' placeholder='$smjer' /><br />
                            <p>Ime razrednika/ce:</p><br />
                            <input type='text' name='name_ct' placeholder='$name_ct' /><br />
                            <input type='submit' value='Sačuvaj promjene' />
                            </form>
                        </div>
                    </div>
            </div>
            <!-- MCS END -->
        </sesction>
</body>
</html>
";}
?>
