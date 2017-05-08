<?php
    session_start();
    require('connection.php');
    if(empty($_SESSION['mUserId'])  && empty($_SESSION['password']))
    {
        header("Location: login.php");
    } else {
    if( $_SESSION['account_type'] == "student"){
    $id =  $_SESSION['mUserId'];
    $password = $_SESSION['password'];
    $firstName = $_SESSION['fname'];
    $lastName = $_SESSION['lname'];
    $sql1 = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
    $row = mysqli_fetch_array($sql1);
    $sql = "SELECT * FROM subjects WHERE mUserId = '$id'";
    $query = mysqli_query($conn,$sql);
    $img_url0 = $row['img_url'];
    $img_url = "img/" . $img_url0;;


    echo"
    <!DOCTYPE html>
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
                               <button id='info' type='button' class='btn btn-success'><a href='logout.php'>Odjavi se</a></button>
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
                    ";if( $_SESSION['account_type'] == "admin"){echo"<button id='info' type='button' class='btn btn-info'><a href='bodovni_sistem.php'>Bodovni Sistem<!--php_code--></a></button>";}
                    echo"
                    <button id='info' type='button' class='btn btn-info'><a href='subject_r.php'>Ocjene<!--php_code--></a></button>";
                    if( $_SESSION['account_type'] == "admin"){echo"<button id='info' type='button' class='btn btn-info'><a href='create_account.php'>Kreiraj korisnički račun<!--php_code--></a></button>
                    <button id='info' type='button' class='btn btn-info'><a href='student_list.php'>Lista učenika<!--php_code--></a></button>"
                ;}
                echo"
                </div>
                    </div>
                <!-- NT END-->
                <hr />
            </div>
            <!-- Menu END-->
            <!-- Main Content Section -->
            <div id='main'>
                <table>
                    <tr>
                        <th>Predmet:</th>
                        <th>Ocjene:</th>
                        <th>Zadnje promijene:</th>
                    </tr>
                    ";while( $row=mysqli_fetch_array($query)) {
    echo "<tr><td>" . $row['subjectName'] . "</td>" . "<td>" . $row['mark'] . "</td><td>" . $row['date'] . "</td></tr>";
}
echo"
                </table>
            </div>
            <!-- MCS END -->
        </sesction>
</body>
</html>

";
}
else {
    $id =  $_SESSION['mUserId'];
    $password = $_SESSION['password'];
    $firstName = $_SESSION['fname'];
    $lastName = $_SESSION['lname'];
    $sql1 = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
    $row = mysqli_fetch_array($sql1);
    $sql = "SELECT * FROM subjects WHERE mUserId = '$id'";
    $query = mysqli_query($conn,$sql);
    $img_url0 = $row['img_url'];
    $img_url = "img/" . $img_url0;


    echo"
    <!DOCTYPE html>
<html>
<head>
    <title>MTS | Dashboard</title>
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
                    <a href='about.php'><button id='info' type='button' class='btn btn-info'>O $firstName $lastName<!--php_code--></button></a>
                    <a href='news_board.php'><button id='info' type='button' class='btn btn-info'>Oglasna Ploča<!--php_code--></button></a>
                    ";if( $_SESSION['account_type'] == "admin"){echo"<a href='bodovni_sistem.php'><button id='info' type='button' class='btn btn-info'>Bodovni Sistem<!--php_code--></button></a>";}
                    echo"
                    <a href='subject_r.php'><button id='info' type='button' class='btn btn-info'>Ocjene<!--php_code--></button></a>";
                    if( $_SESSION['account_type'] == "admin"){echo"<a href='create_account.php'><button id='info' type='button' class='btn btn-info'>Kreiraj korisnički račun<!--php_code--></button></a>
                    <a href='student_list.php'><button id='info' type='button' class='btn btn-info'>Lista učenika<!--php_code--></button></a>
                    <a href='action_log.php'><button id='info' type='button' class='btn btn-info'>Action Log<!--php_code--></button></a>
                ";}
                echo"
                </div>
                    </div>
                <!-- NT END-->
                <hr />
            </div>
            <!-- Menu END-->
            <!-- Main Content Section -->
            <div id='main'>
                <form action='admin_subject.php' method='get'>
                        <input type='text' name='ime' placeholder='Unesite ime učenika...' required>
                        <input type='text' name='prezime' placeholder='Unesite prezime učenika...' required>
                        <input type='submit' value='Učitaj podatke'>
                    </form>
            </div>
            <!-- MCS END -->
        </sesction>
</body>
</html>

";
}}
?>
