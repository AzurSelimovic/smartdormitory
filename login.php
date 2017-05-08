<!DOCTYPE html>
<html>
<head>
    <title>SmartDormitory | Login</title>
    <link rel="shortcut icon" href="img/finlogo.png" type="image/x-icon">
	<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <link href="css/login_site.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="row">
        <div class="col-md-3">
            </div>
        <div class="col-md-6">
            <div id="logo">
                <div align="center">
                <img src="css/logo_izvor_nade.png" />
                </div>
            </div>
            <div id="login_form">
       <form action="login_a.php" method="post">
        <p>Korisnički ID:</p><br/>
           <hr />
        <input type="text" name="mUserId" placeholder="Unesite svoj korisnički ID" required/><br/>
        <p>Šifra:</p><br/>
           <hr />
        <input type="password" name="password" placeholder="******" required/><br/>
        <input type="submit" value="Prijava"/>

    </form>
            </div>
            </div>
        </div>

</body>
</html>
