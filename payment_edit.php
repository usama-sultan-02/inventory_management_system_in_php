<?php
session_start();
	
	if(!isset($_SESSION['id']))
	{
		header('location:index.php');
		exit;
	}
 
    include('conn.php');

// $new_id=0;
// $d="";
//     $db_query = "SELECT `id_no` from `weight_record` ORDER BY `id` DESC LIMIT 1";
// $result=mysqli_query($conn,$db_query);
// while($getinitialcount=mysqli_fetch_array($result))
// {
//   $new_id=$getinitialcount['unique_id'];
//   $new_id = (int) filter_var($new_id, FILTER_SANITIZE_NUMBER_INT); 
//   $new_id=abs($new_id);

// }
// $new_id=$new_id+1;
// if ($new_id<10) {
// 	$d="00".$new_id;
// 	$digit="wr".$d;
// }else if($new_id>=10 && $new_id<100){
// 	$d="0".$new_id;
// 	$digit="wr".$d;
// }else{
// 	$digit="wr".$new_id;
// }


    // $station="";
    // $role=$_SESSION['role'];
    // $policeman_id=$_SESSION['user_id'];
    // $sql=mysqli_query($conn,"SELECT * FROM `policeman` WHERE `policeman_id`='$policeman_id'");
    // while ($row=mysqli_fetch_array($sql)){
    // 	$station=$row['station'];
    // }

    //echo "<script> alert('$station'); </script>";

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
							---
						</div>
						
						<div class="panel-options">
							<!-- <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> -->
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<!-- <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> -->
						</div>
					</div>
					<?php
						include('conn.php');
                            $id=$_GET['payment_id'];
                    $sql="SELECT * FROM `main` WHERE id=$id";
                    $run_sql=mysqli_query($conn,$sql);
                  while($rows=mysqli_fetch_array($run_sql)){
                            $date=$rows['date'];
                            $debit=$rows['debit'];
                            $credit=$rows['credit']; 
                            $description=$rows['description'];
                            }

                            
						?>
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" id="form" method="post" enctype="multipart/form-data">


							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Debit</label>
										
										<div class="col-sm-8">
											<input type="number" class="form-control" id="debit" name="debit" placeholder="Debit" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $debit; ?>" required="">

										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">credit</label>
										
										<div class="col-sm-8">
											<input type="number" class="form-control" id="credit" name="credit" placeholder="Credit" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $credit; ?>" required="">

										</div>
									</div>

							</div>


							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
									<label for="" class="col-sm-4 control-label" style="text-align: left;">Date</label>
									
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" class="form-control datepicker" data-format="dd-m-yyyy" style="border: 1px solid #ccc;" placeholder="Select Date" id="date" name="date" autocomplete="off" value="<?php echo $date; ?>" required>
											
											<div class="input-group-addon" style="border: 1px solid #ccc;">
												<a href="#"><i class="entypo-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group col-sm-6">
									<label class="col-sm-4 control-label" style="text-align: left;">Description</label>
									
									<div class="col-sm-8">
										<textarea class="form-control" id="description" name="description" placeholder="Item Description" style="border: 1px solid #ccc;" required><?php echo $description; ?></textarea>

									</div>
								</div>

								
							</div>



							


							

							




							



							<div class="row col-sm-12">
								<hr>
							</div>
							<!-- <div id="animal_detail">
								
							</div> -->


							<div class="col-sm-12 row">
								<div class="form-group">
										<div class="col-sm-offset-4 col-sm-4">
											<button type="submit" name="submit" class="btn btn-info">Update</button>
											<!-- <button type="submit" name="submit" id="" class="btn btn-danger">View</button> -->

											<input type="button" class="btn btn-primary" onclick="location.href='payment_list.php';" value="View" />
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
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>

	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

	<script src="assets/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>

	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">
	<link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
<script src="assets/js/select2/select2.min.js"></script>

</body>
</html>
<?php
include('conn.php');
if (isset($_POST['submit'])){

	$date=$_POST['date'];
	$description=$_POST['description'];
	$debit=$_POST['debit'];
	$credit=$_POST['credit'];

	// $sql=mysqli_query($conn, "INSERT INTO `main` (`id`, `date`, `debit`, `credit`, `description`) 
	// 							VALUES (NULL, '$date', '$debit', '$credit', '$description')");

	$sql=mysqli_query($conn, "UPDATE `main` SET `date`='$date',
												`debit`='$debit',
												`credit`='$credit',
												`description`='$description'
												WHERE `id`='$id'");


	if (!$sql){
		echo "<script> alert('Failed to Connect'); </script>";
	}else{
		echo "<script> alert('Updated Successfully'); </script>";
		echo "<script>
			    window.location.replace('payment_list.php');
			</script>";
	}
}
	
?>
