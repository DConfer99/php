<?php
//start session
if(!isset($_SESSION)){
	session_start();
}

//runs if user pressed submit button
if(isset($_POST['submit'])){
	$email= $_SESSION['email'];
	$first_name= $_POST['first_name'];
	$last_name= $_POST['last_name'];
	$title= $_POST['title'];
	$description= $_POST['description'];


echo "\"" . $_FILES['new_image']['name'] . "\"";
if ($_FILES['new_image']['name'] == ""){
	echo "hello";
}
// var_dump($_FILES['new_image']);
//
// $uploadError = $_FILES['new_image']['error'];
// if ($uploadError == 0) {
// 	if(!file_exists("./images/" . $_SESSION['user_id'] . "/")){
// 		mkdir("./images/" . $_SESSION['user_id'] . "/");
// 	}
//
// 	$file_type = $_FILES['new_image']['type'];
// 	$file_type=substr($file_type,6);
//
// 	$new_image_file_path="./images/" . $_SESSION['user_id'] . "/avatar." . $file_type;
//
// 	move_uploaded_file($_FILES['new_image']['tmp_name'], $new_image_file_path);
//
//
// 	$conn = new mysqli('localhost', 'dillon', 'southhills#', 'dillon');
// 	$sql = "UPDATE fm_users SET first_name = \"$first_name\", last_name = \"$last_name\", title = \"$title\", description = \"$description\", avatar_url = \"$new_image_file_path\" where email_addr = \"$email\"";
// 	$conn->query($sql);
//

//} //Ends Post If









	// $sql="SELECT first_name, last_name, title, description, avatar_url FROM fm_users WHERE email_addr = \"$email\"";
	// $result=$conn->query($sql);
	//
	// while ($row = $result->fetch_assoc()){
	// 		$_SESSION['first_name'] = $row['first_name'];
	// 		$_SESSION['last_name'] = $row['last_name'];
	// 		$_SESSION['title'] = $row['title'];
	// 		$_SESSION['description'] = $row['description'];
	// 		$_SESSION['avatar_url'] = $row['avatar_url'];
	// 	}

	//header("Location: profile.php");
}
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Edit Profile</title>

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
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-bar"></span>
								<span class="navbar-toggler-bar"></span>
								<span class="navbar-toggler-bar"></span>
	            </button>
	            <a class="navbar-brand" href="https://www.youtube.com/channel/UCqhC4CJNWTKPIDpeuqjqMng">PickledTeddiesGaming!</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a href="login.php" class="nav-link">Login</a>
	                </li>
									<li class="nav-item">
	                    <a href="#" class="nav-link">
													<?php
															echo $_SESSION['email'];
													?>
											</a>
	                </li>
	            </ul>
	        </div>
		</div>
    </nav>
    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('<?php echo $_SESSION['background_url']; ?>');">
			<div class="filter"></div>
		</div>
		<div class="section landing-section">
				<div class="container">
						<div class="row">
								<div class="col-md-8 ml-auto mr-auto"> <!--takes up 8 of 12 square, left and right margin auto adjust to center-->
										<h2 class="text-center">A profile as unique as you!</h2>
										<form class="contact-form" action="" method="post" enctype="multipart/form-data">




											<div class="row">
												<div class="col-md-3 ml-auto mr-auto">
													<label>Avatar Image</label>
														<div class="avatar">
																<img src="<?php echo $_SESSION['avatar_url'];?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
																<input type="file" name="new_image">
														</div>
												</div>
											</div>




												<div class="row"> <!--row within row-->
														<div class="col-md-6"> <!--further dives takes up half of another 12-->
																<label>First Name</label>
																<div class="input-group">
																	<span class="input-group-addon">
																			<i class="nc-icon nc-single-02"></i>
																	</span>
																	<input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $_SESSION['first_name']; ?>">
															</div>
														</div>
														<div class="col-md-6"> <!-- takes up other half -->

																<label>Last Name</label>
																	<div class="input-group">
																	<span class="input-group-addon">
																				<i class="nc-icon nc-single-02"></i>
																	</span>
																	<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $_SESSION['last_name']; ?>">
																	</div>
														</div>
												</div> <!--Ends first row-->

												<label>Title</label>
													<div class="input-group">
													<span class="input-group-addon">
																<i class="nc-icon nc-tag-content"></i>
													</span>
													<input type="text" class="form-control" name="title" placeholder="What are you?" value="<?php echo $_SESSION['title']; ?>">
													</div>

												<label>Description</label>
												<textarea class="form-control" name="description" rows="4" placeholder="A little bit about you..."><?php echo $_SESSION['description']; ?></textarea>
												<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
																<button class="btn btn-danger btn-lg btn-fill" type="submit" name="submit">Update your Profile!</button>
														</div>
												</div>
										</form>
								</div>
						</div>
				</div>
		</div>
</div>
	</div>
	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                        <li><a href="http://blog.creative-tim.com">Blog</a></li>
                        <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
