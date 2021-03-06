<?php
if (!isset($_SESSION)){
	session_start();
}

$conn = new mysqli('localhost', 'dillon', 'southhills#', 'dillon');

if ($_POST['email'] != "" && $_POST['password'] != ""){
	header ("Location: login.php");
}
 ?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Register</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('images/chem_plant.png');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register">
                                <h3 class="title">Welcome to the revolution.</h3>
                                <form class="register-form" method="post" action="">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">

                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <button type="submit" class="btn btn-danger btn-block btn-round">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
<?php
if ($_POST['email'] != "" && $_POST['password'] != ""){
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$sql = "INSERT INTO fm_users (email_addr, password) VALUES ('$email', '$password')";
	$conn->query($sql);
}
?>


					<div class="footer register-footer text-center">
						<h6>&copy; <script>document.write(new Date().getFullYear())</script>, modified with <i class="fa fa-heart heart"></i> by Dillon Confer</h6>
					</div>
                </div>
        </div>
    </div>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/js/tether.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.0.1"></script>

</html>
