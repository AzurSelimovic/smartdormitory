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
        $linkName = $_GET['linkName'];
        $linkSurname = $_GET['linkSurname'];

        $sql1 = mysqli_query($conn,"SELECT * FROM user WHERE fname = '$linkName' and lname='$linkSurname'");
        $brojac = 0;
        $row0 = mysqli_fetch_array($sql1);
        $date_of_b = $row0['date_b'];
        $school_name = $row0['school_name'];
        $uso = $row0['uso'];
        $grade = $row0['grade'];
        $family_members = $row0['family_members'];
        $fatherName = $row0['fatherName'];
        $motherName = $row0['motherName'];
        $fJob = $row0['fJob'];
        $mJob = $row0['mJob'];
        $linkId = $row0['id'];
        $dosijeUcenika = $row0['dosijeUcenika'];
        $sql2 = mysqli_query($conn,"SELECT * FROM subjects WHERE mUserId = '$linkId'");
        $suma = 0;
        $sql1 = mysqli_query($conn,"SELECT * FROM bodovni_sistem WHERE userId = '$linkId'");

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
            <h3>Osnovne informacije:</h3><br>
            <p>Ime i prezime: $linkName $linkSurname</p>
            <p>Datum rođenja: $date_of_b</p>
            <p>Naziv i sjedište škole: $school_name</p>
            <p>Smjer: $uso</p>
            <p>Rzred: $grade</p>
            <h3>Porodica:</h3>
            <p>Broj članova porodice: $family_members</p>
            <p>Ime oca: $fatherName</p>
            <p>Ime majke: $motherName</p>
            <p>Zanimanje oca: $fJob</p>
            <p>Zanimanje majke: $mJob</p>
            <a href='personalDocs/$dosijeUcenika' target='_blank'><button type='button' class='btn btn-info'>Preuzmite dosije učenika u .pdf formatu</button></a>
            <h3>Ocjene:</h3>
            <hr/>
             <table>
                    <tr>
                        <th>Predmet:</th>
                        <th>Ocjene:</th>
                        <th>Zadnje promijene:</th>
                    </tr>
                    ";while( $row2=mysqli_fetch_array($sql2)) {
    echo "<tr><td>" . $row2['subjectName'] . "</td>" . "<td>" . $row2['mark'] . "</td><td>" . $row2['date'] . "</td></tr>";
}
echo"
                </table>
                <h3>Bodovni sistem:</h3>
                <hr/>
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
        }
?>
