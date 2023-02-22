<?php
session_start();
	
	if(!isset($_SESSION['id']))
	{
		header('location:index.php');
		exit;
	}
 
    include('conn.php');


    $session_user_id=$_SESSION['id'];
    $sql=mysqli_query($conn,"SELECT * FROM `user` WHERE `id`='$session_user_id'");
    while ($row=mysqli_fetch_array($sql)){
    	$u_name=$row['username'];
    	$u_password=$row['password'];
    }

    // echo "<script> alert('$session_user_id'); </script>";
    // echo "<script> alert('$username'); </script>";
    // echo "<script> alert('$password'); </script>";

    $dig=mt_rand(10000,99999);
    $digit="c-".$dig;
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

	<title>Vetement</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- <link rel="stylesheet" href="assets/css/skins/red.css"> -->

	<script src="assets/js/jquery-1.11.3.min.js"></script>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('sidebar.php'); ?>

	<div class="main-content" >
				
		<?php include('header.php'); ?>
		
		<hr />
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Update Username Password
						</div>
						
						<div class="panel-options">
							<!-- <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> -->
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<!-- <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> -->
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" id="form" method="post" enctype="multipart/form-data">
							<div class="col-sm-12 row">
								

								<div class="form-group col-sm-6">
									<label class="col-sm-4 control-label" style="text-align: left;">Username</label>
									
									<div class="col-sm-8">
										<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $u_name; ?>" required="">

									</div>
								</div>

                                <div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Password</label>
										
										<div class="col-sm-8">
											<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $u_password; ?>" required="" minlength="8">
                                            <span id="password_length"></span>
										</div>
									</div>

								
							</div>



							<div class="row col-sm-12">
								<hr>
							</div>


							<div class="col-sm-12 row">
								<div class="form-group">
										<div class="col-sm-offset-4 col-sm-4">
											<button type="submit" name="submit" id="submit" class="btn btn-info">Update</button>
											<!-- <button type="submit" name="submit" id="" class="btn btn-danger">View</button> -->

											<input type="button" class="btn btn-primary" onclick="location.href='admin.php';" value="Cancel" />
										</div>
									</div>
								
							</div>
						</form>
					
					</div>
				
				</div>
				
			</div>
		</div>

	</div>
		
	<?php //include('chat.php'); ?>

</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>

	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>


</body>
</html>
<?php
include('conn.php');
if (isset($_POST['submit'])){

	$username=$_POST['username'];
	$password=$_POST['password'];

    $len = strlen($password);

    if($username=="" || $len<8){
        echo "<script> alert('Failed To Update'); </script>";
    }else{

        //$sql="INSERT INTO `customer` (`id`, `customer_id`, `customer_name`, `phone`, `address`) VALUES (NULL, '$customer_id', '$customer_name', '$phone', '$address');";

        $sql="UPDATE `user` SET `username`='$username', `password`='$password' WHERE `id`='$session_user_id'";
        $query=mysqli_query($conn, $sql);

        if (!$query){
            echo "<script> alert('Failed to Connect'); </script>";
        }else{
            echo "<script> alert('Updated Successfully'); </script>";
            echo "<script>
                    window.location.replace('admin.php');
                </script>";
        }

    }
	

	
}
	
?>

<script>
   
     $(document).ready(function(){            
   
        $("#submit").click(function(e){

            var password = $("#password").val()
            var pass_len = password.length;

            if (pass_len < 8) {
                alert('Password should be Minmum 8 characters');
                $("#password").val(" ");
            }
            else {


                }
        });
     });
    
</script>