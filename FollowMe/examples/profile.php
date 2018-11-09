<?php
//start session
if(!isset($_SESSION)){
	session_start();
}

$conn = new mysqli('localhost', 'dillon', 'southhills#', 'dillon');
$sql= "select avatar_url, first_name, last_name, title from fm_users where user_id in ((select following_user_id from fm_follows where user_id=" . $_SESSION['user_id'] . "));";
$following=$conn->query($sql);

$sql= "select avatar_url, first_name, last_name, title from fm_users where user_id in ((select user_id from fm_follows where following_user_id=" . $_SESSION['user_id'] . "));";
$followers=$conn->query($sql);
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Profile</title>

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
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="<?php echo $_SESSION['avatar_url'];?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="name">
                        <h4 class="title"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];?><br /></h4>
						<h6 class="description"><?php echo $_SESSION['title']; ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <p><?php echo $_SESSION['description']; ?></p>
                        <br />
                        <a href="edit_profile.php"><btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i>Edit</btn></a>
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Followers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#following" role="tab">Following</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content following">
                    <div class="tab-pane active" id="follows" role="tabpanel">
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <ul class="list-unstyled follows">

																	<?php while($row = $followers->fetch_assoc()){
																		$avatar_url = $row['avatar_url'];
																		$first_name = $row['first_name'];
																		$last_name = $row['last_name'];
																		$title = $row['title'];
																		?>
																		<li>
																				<div class="row">
																						<div class="col-md-2 col-sm-2 ml-auto mr-auto">
																								<img src="<?php echo $avatar_url; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
																						</div>
																						<div class="col-md-7 col-sm-4  ml-auto mr-auto">
																								<h6><?php echo $first_name; echo " "; echo $last_name;?><br/><small><?php echo $title; ?></small></h6>
																						</div>
																				</div>
																		</li>
																		<hr />
																	<?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="following" role="tabpanel">
											<div class="row">
													<div class="col-md-4 ml-auto mr-auto">
															<ul class="list-unstyled follows">



																<?php while($row = $following->fetch_assoc()){
																	$avatar_url = $row['avatar_url'];
																	$first_name = $row['first_name'];
																	$last_name = $row['last_name'];
																	$title = $row['title'];
																	?>
																	<li>
																			<div class="row">
																					<div class="col-md-2 col-sm-2 ml-auto mr-auto">
																							<img src="<?php echo $avatar_url; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
																					</div>
																					<div class="col-md-7 col-sm-4  ml-auto mr-auto">
																							<h6><?php echo $first_name; echo " "; echo $last_name;?><br/><small><?php echo $title; ?></small></h6>
																					</div>
																			</div>
																	</li>
																	<hr />
																<?php } ?>


															</ul>
													</div>
											</div>
                        <a href="start_following.php"><button class="btn btn-warning btn-round">Start Following!</button></a>
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
