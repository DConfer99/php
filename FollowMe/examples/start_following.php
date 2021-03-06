
<?php
if(!isset($_SESSION)){
	session_start();
}

$conn = new mysqli('localhost', 'dillon', 'southhills#', 'dillon');






//run SQL query to determine maximum user_id in database
$sql="SELECT max(user_id) from fm_users";
$maxResult=$conn->query($sql);

while($row = $maxResult->fetch_row()){
	$maxUserID=$row[0];
}

//POST will return a list of variables whoose values are are user_ids of users that need to be followed, store values in array using for loop, test to see what values != ""
for ($i=0; $i <= $maxUserID; $i++) {
	if ($_POST[$i] != "") {
		$newFollowsArray[] = $_POST[$i];
	}
}

//run for loop to insert these values into fm_follows, the user_id will be $_SESSION['user_id'] and the following_user_id will be the values from POST, use if(in_array())
foreach ($newFollowsArray as $key => $user_id) {
	$sql="insert into fm_follows (user_id, following_user_id) values (" . $_SESSION['user_id'] ."," . $user_id . ")";
	$conn->query($sql);
}

$sql = "select user_id from fm_users";
$user_id_result=$conn->query($sql);

while($row = $user_id_result->fetch_assoc()){
	$user_id = $row['user_id'];
	//obtain array of all user_ids in DB using SQL
	$allUsersArray[]=$user_id;
}

//remove entries from array that are the values returned in POST (the users currently being followed)
foreach ($newFollowsArray as $key => $user_id) {
	$allUsersArrayKey=array_search($user_id, $allUsersArray);
	array_splice($allUsersArray, $allUsersArrayKey,1);
	//remove user_id from $allUsersArray
}

if(isset($_POST['submit'])){
	foreach ($allUsersArray as $key => $user_id_unfollow) {
		// use for loop to run SQL to remove all other database entries where user_id = $_SESSION['user_id']
		$sql="delete from fm_follows where user_id =" . $_SESSION['user_id'] . " and following_user_id =" . $user_id_unfollow;
		$conn->query($sql);
	}
	header("Location: profile.php");
}

$sql = "select user_id, avatar_url, first_name, last_name, title from fm_users";
$result=$conn->query($sql);

$sql = "SELECT following_user_id FROM dillon.fm_follows where user_id=" . $_SESSION['user_id'];
$following=$conn->query($sql);

//or can use fetch_row()
while($row = $following->fetch_assoc()){
 $followingArray[] = $row['following_user_id'];
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Start Following</title>

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
	       <a class="navbar-brand" href="#">Follow Me</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a href="login.php" class="nav-link">Login</a>
	                </li>
									<li class="nav-item">
	                    <a href="#" class="nav-link">
										<?php echo $_SESSION['email']; ?>
										</a>
	                </li>
	            </ul>
	        </div>
		</div>
    </nav>

    <div class="wrapper">
      <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			  <div class="filter"></div>
		  </div>

			<br />
			<br />

			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
					<form method="post" action="">
					<ul class="list-unstyled follows">

						<?php

						while($row = $result->fetch_assoc()){
								$avatar_url = $row['avatar_url'];
								$first_name = $row['first_name'];
								$last_name = $row['last_name'];
								$title = $row['title'];
								$user_id = $row['user_id'];

								echo "<li>";
								echo "<div class=\"row\">";
								echo "<div class=\"col-md-2 col-sm-2 ml-auto mr-auto\">";
								echo "<img src=\"" . $avatar_url . "\" alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">";
								echo "</div>";
								echo "<div class=\"col-md-7 col-sm-4  ml-auto mr-auto\">";
								echo "<h6>" . $first_name . " " . $last_name . "<br/><small>" . $title . "</small></h6>";
								echo "</div>";
								echo "<div class=\"col-md-3 col-sm-2  ml-auto mr-auto\">";
								echo "<div class=\"form-check\">";
								echo "<label class=\"form-check-label\">";
								echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"$user_id\" name=\"$user_id\"";

								if (in_array($user_id, $followingArray)){
									echo "checked";
								}

								echo ">";


								echo "<span class=\"form-check-sign\"></span>";
								echo "</label>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
								echo "</li>";
								echo "<hr />";

						}


						 ?>
					</ul>
					<button class="btn btn-danger btn-lg btn-fill" type="submit" name="submit">Start Following!</button>
				</form>
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
