<?php 
session_start();
require_once('conn.php'); 

if(isset($_POST['login']))
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username 		= trim($_POST['username']);
		$password 	= trim($_POST['password']);
		// $role 	= trim($_POST['role']);
		//$md5Password = md5($password);
		
		$sql = "SELECT * FROM user WHERE username = '".$username."' and password = '".$password."'";
		$rs = mysqli_query($conn,$sql);
		$getNumRows = mysqli_num_rows($rs);
		
		if($getNumRows == 1)
		{
			$getUserRow = mysqli_fetch_assoc($rs);
			unset($getUserRow['password']);
			
            //$_SESSION['email'] =$email;
			$_SESSION = $getUserRow;
						
			//header('location:index.php');

			?>
			<script>
			    window.location.replace("admin.php");

			</script>
			<?php

			exit;
		}
		else
		{
			$errorMsg = "Wrong CNIC or password";
		}
	}
}

if(isset($_GET['logout']) && $_GET['logout'] == true)
{
	session_destroy();
	header("location:index.php");
	exit;
}


if(isset($_GET['lmsg']) && $_GET['lmsg'] == true)
{
	$errorMsg = "Login required to access dashboard";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.ico">

	<title>Vetement Login</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" style="background-color: white;">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="#" class="logo">
				<!--<img src="assets/images/logo@2x.png" width="120" alt="" />-->
				<!-- <img src="assets/images/exxx2.png" width="150" alt="" /> -->
				<label><h1 style="color: white;">Vetement</h1></label>
			</a>
			
			<!--<p class="description">Dear user, log in to access the admin area!</p>-->

		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			
			<form method="post" role="form" >
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login" name="login">
						<i class="entypo-login"></i>
						Login In
					</button>
				</div>
				
			</form>
			
			<!--<div class="login-bottom-links">-->
				
			<!--	<a href="#" class="link">Forgot your password?</a>-->
												
			<!--</div>-->
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-login.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>

	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>