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
    $digit="p-".$dig;
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
							Purchase
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
									<label for="" class="col-sm-4 control-label" style="text-align: left;">Purchase Code</label>
									
									<div class="col-sm-8">
										<input type="text" class="form-control" id="item_code" name="item_code" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $digit; ?>" readonly="">
									</div>
								</div>

								<div class="form-group col-sm-6">
									<label class="col-sm-4 control-label" style="text-align: left;">Item Name</label>
									
									<div class="col-sm-8">
										<!-- <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" style="border: 1px solid #ccc;" autocomplete="off" value="" required=""> -->

										<select name="item_id" id="item_id" class="select2" data-allow-clear="true" data-placeholder="Select Item" style="" required>
											<option></option>
											<optgroup label="Items In list">
												<?php 
												$sql=mysqli_query($conn,"SELECT * FROM `items`");
												while ($row=mysqli_fetch_array($sql)){  ?>
												<option value="<?php echo $row['item_code']; ?>"><?php echo $row['item_name']; ?></option>
													<?php  }  ?>
											</optgroup>
										</select>
									</div>
								</div>

								
							</div>



							


							

							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
										<label for="address" class="col-sm-4 control-label" style="text-align: left;">Date:</label>
										
										<div class="col-sm-8">
											<div class="input-group">
										<input type="text" class="form-control datepicker" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" id="date" name="date" autocomplete="off" required>
										
										<div class="input-group-addon" style="border: 1px solid #ccc;">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Quantity</label>
										
										<div class="col-sm-8">
											<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

										</div>
									</div>

							</div>



							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
										<label for="address" class="col-sm-4 control-label" style="text-align: left;">Unit Price</label>
										
										<div class="col-sm-8">
											<input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Unit Price" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Total Price</label>
										
										<div class="col-sm-8">
											<input type="number" class="form-control" id="total_price" name="total_price" placeholder="Total Price" style="border: 1px solid #ccc;" required="" readonly>

										</div>
									</div>

							</div>


							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
										<label for="address" class="col-sm-4 control-label" style="text-align: left;">Purchase From</label>
										
										<div class="col-sm-8">
											<input type="text" class="form-control" id="purchase_from" name="purchase_from" placeholder="Purchase From" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Description</label>
										
										<div class="col-sm-8">
											<textarea class="form-control" id="purchase_description" name="purchase_description" placeholder="Item Description" style="border: 1px solid #ccc;" ></textarea>

										</div>
									</div>

							</div>


							<!-- <div class="col-sm-12 row">
								<div class="form-group col-sm-6">
									<label for="" class="col-sm-4 control-label" style="text-align: left;">Item Description</label>
									
									<div class="col-sm-8">
										<textarea class="form-control" id="item_description" name="item_description" placeholder="Item Description" style="border: 1px solid #ccc;" ></textarea>
									</div>
								</div>


								<div class="form-group col-sm-6">
						        	<label for="phone" class="col-sm-4 control-label"></label>
									<div class="col-sm-4" id="img">
						                        
						                <img src="assets/images/blank.png" style="height: 100px; width: 100px;" id="image_show" class="img-thumbnail rounded mx-auto d-block" />

						                <input type="file" name="fileToUpload" id="fileToUpload" class="btn" accept=".png, .jpg, .jpeg" required="">
						                <button type="button" name="clear-image" id="clear-image" class="btn">Clear Image</button>
						            </div> 
								</div>
							</div> -->



							<div class="row col-sm-12">
								<hr>
							</div>
							<!-- <div id="animal_detail">
								
							</div> -->


							<div class="col-sm-12 row">
								<div class="form-group">
										<div class="col-sm-offset-4 col-sm-4">
											<button type="submit" name="submit" class="btn btn-info">Add</button>
											<!-- <button type="submit" name="submit" id="" class="btn btn-danger">View</button> -->

											<input type="button" class="btn btn-primary" onclick="location.href='purchase_list.php';" value="View" />
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

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

	<!-- Imported scripts on this page -->
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/neon-chat.js"></script>

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

	$item_code=$_POST['item_id'];
	//$item_name=$_POST['item_name'];
	$date=$_POST['date'];
	$quantity=$_POST['quantity'];
	$unit_price=$_POST['unit_price'];
	$total_price=$_POST['total_price'];
	$purchase_from=$_POST['purchase_from'];
	$purchase_description=$_POST['purchase_description'];


	



	// $target_dir = "upload/";
	// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    // $name=$_FILES["fileToUpload"]["name"];


	//$item_image=$_POST['item_image'];


	$sql="INSERT INTO `purchase` (`id`, `item`, `date`, `quantity`, `unit_price`, `total_price`, `purchase_from`, `description`) VALUES (NULL, '$item_code', '$date', '$quantity', '$unit_price', '$total_price', '$purchase_from', '$purchase_description');";
	$query=mysqli_query($conn, $sql);

	if (!$query){
		echo "<script> alert('Failed to Connect'); </script>";
	}else{

			$sql=mysqli_query($conn, "SELECT * FROM `stock` WHERE `item_code`='$item_code'");
			$check=mysqli_num_rows($sql);
			while ($row=mysqli_fetch_array($sql)){
				$qty=$row['qty'];
			}
			if($check==1){
				//echo "<script> alert('Item Exist'); </script>";
				$update_qty=$qty+$quantity;
				$stock_update="UPDATE `stock` SET `qty`='$update_qty' WHERE `item_code`='$item_code'";
				$stock_update_query=mysqli_query($conn, $stock_update);
			}else{
				//echo "<script> alert('Item Not Exist'); </script>";
				$stock="INSERT INTO `stock` (`id`, `item_code`, `qty`) VALUES (NULL, '$item_code', '$quantity');";
				$stock_query=mysqli_query($conn, $stock);
			}
			
		

		// $stock="INSERT INTO `stock` (`id`, `item_code`, `qty`) VALUES (NULL, '$item_code', '$quantity');";
		// $stock_query=mysqli_query($conn, $stock);

		echo "<script> alert('Data Inserted Successfully'); </script>";
		echo "<script>
			    window.location.replace('purchase_list.php');
			</script>";
	}
}
	
?>

<script type="text/javascript">
   	$(document).ready(function(){

  $("#id_no").change(function(){
		    //alert('add');
		    var animal_no=$("#id_no").val();

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{animal_detail:animal_no},
			     success:function(data){
			     	result = $.trim(data);
			     	$('#animal_detail').html(data);
			     }
		    });


		  });


		  $("#quantity").keyup(function(){
		    //alert('add');
		    var quantity=$("#quantity").val();
			var unit_price=$("#unit_price").val();
			var t_price=parseInt(quantity)*parseInt(unit_price);
			$("#total_price").val(t_price);
		    
		  });

		  $("#unit_price").keyup(function(){
		    //alert('add');
		    var quantity=$("#quantity").val();
			var unit_price=$("#unit_price").val();
			var t_price=parseInt(quantity)*parseInt(unit_price);
			$("#total_price").val(t_price);
		    
		  });



});
   </script>