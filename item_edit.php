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

    $digit=mt_rand(10000,99999);
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
							Update Item
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
                            $id=$_GET['item_id'];
                    $sql="SELECT * FROM items WHERE id=$id";
                    $run_sql=mysqli_query($conn,$sql);
                  while($rows=mysqli_fetch_array($run_sql)){
                            $item_code=$rows['item_code'];
                            $item_name=$rows['item_name'];
                            $date=$rows['date']; 
                            $price=$rows['price'];
                            $item_description=$rows['item_description'];
                            $item_image=$rows['item_image'];
                            }

                            
						?>
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" id="form" method="post" enctype="multipart/form-data">
							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
									<label for="" class="col-sm-4 control-label" style="text-align: left;">Item Code</label>
									
									<div class="col-sm-8">
										<input type="text" class="form-control" id="item_code" name="item_code" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $item_code; ?>" readonly="">
									</div>
								</div>

								<div class="form-group col-sm-6">
									<label class="col-sm-4 control-label" style="text-align: left;">Item Name</label>
									
									<div class="col-sm-8">
										<input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $item_name; ?>" required="">

										<!-- <select name="id_no" id="id_no" class="select2" data-allow-clear="true" data-placeholder="Select Animal" >
												<option></option>
												<optgroup label="Animal In list">
													<?php /*
										$sql=mysqli_query($conn,"SELECT * FROM `animal_in`");
										while ($row=mysqli_fetch_array($sql)){
											*/?>
											<option value="<?php //echo $row['unique_id']; ?>"><?php //echo $row['unique_id']; ?></option>
											<?php
										//}	?>
												</optgroup>
											</select> -->
									</div>
								</div>

								
							</div>



							


							

							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
										<label for="address" class="col-sm-4 control-label" style="text-align: left;">Date:</label>
										
										<div class="col-sm-8">
											<div class="input-group">
										<input type="text" class="form-control datepicker" data-format="dd-m-yyyy" style="border: 1px solid #ccc;" placeholder="Select Date" id="date" name="date" autocomplete="off" value="<?php echo $date; ?>">
										
										<div class="input-group-addon" style="border: 1px solid #ccc;">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Price</label>
										
										<div class="col-sm-8">
											<input type="text" class="form-control" id="price" name="price" placeholder="Price" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $price; ?>" required="">

										</div>
									</div>

							</div>


							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
									<label for="" class="col-sm-4 control-label" style="text-align: left;">Item Description</label>
									
									<div class="col-sm-8">
										<!-- <input type="text" class="form-control" id="item_code" name="item_code" style="border: 1px solid #ccc;" autocomplete="off" value=""> -->
										<textarea class="form-control" id="item_description" name="item_description" placeholder="Item Description" style="border: 1px solid #ccc;"><?php echo $item_description; ?></textarea>
									</div>
								</div>

								<div class="form-group col-sm-6">
						        	<label for="phone" class="col-sm-4 control-label"></label>
									<div class="col-sm-4" id="img">
						                        
						                <img src="upload/<?php echo $item_image; ?>" style="height: 100px; width: 100px;" id="image_show" class="img-thumbnail rounded mx-auto d-block" />

						                <input type="file" name="fileToUpload" id="upload_image" class="btn" accept=".png, .jpg, .jpeg" value="<?php echo $item_image; ?>" title="<?php echo $item_image; ?>">

						                <button type="button" name="clear-image" id="clear-image" class="btn">Clear Image</button>

						                <!-- <button type="file" name="clear-image" id="clear-image" class="btn">Clear Image</button> -->


						                <!-- <img src="" width="120" height="120" id="output">
										<input type="file" name="fileToUpload" id="fileToUpload"  class="btn" onchange="loadFile(event);"> -->
						                    
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

											<input type="button" class="btn btn-primary" onclick="location.href='item_detail.php';" value="View" />
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

	$item_code=$_POST['item_code'];
	$item_name=$_POST['item_name'];
	$date=$_POST['date'];
	$price=$_POST['price'];
	$item_description=$_POST['item_description'];


	$name=$_FILES['fileToUpload']['name'];
	if($name != "")
	{
	    $target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	    //$name=$_FILES["fileToUpload"]["name"];

		$sql="UPDATE `items` SET 
				`item_code`='$item_code',
				`item_name`='$item_name',
				`date`='$date',
				`price`='$price',
				`item_description`='$item_description',
				`item_image`='$name'
				WHERE `id`='$id'";
		$query=mysqli_query($conn, $sql);
		if (!$query){
			echo "<script> alert('Failed to Connect'); </script>";
		}else{
			echo "<script> alert('Updated Successfully'); </script>";
			echo "<script> window.location.replace('item_detail.php'); </script>";
		}  

	}else
	{
	    $sql="UPDATE `items` SET 
			`item_code`='$item_code',
			`item_name`='$item_name',
			`date`='$date',
			`price`='$price',
			`item_description`='$item_description'
			WHERE `id`='$id'";

		$query=mysqli_query($conn, $sql);
		if (!$query){
			echo "<script> alert('Failed to Connect'); </script>";
		}else{
			echo "<script> alert('Updated Successfully'); </script>";
			echo "<script> window.location.replace('item_detail.php'); </script>";
		}

	}



	// $target_dir = "upload/";
	// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	// $uploadOk = 1;
	// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    // $name=$_FILES["fileToUpload"]["name"];

	// $sql="UPDATE `items` SET 
	// 		`item_code`='$item_code',
	// 		`item_name`='$item_name',
	// 		`date`='$date',
	// 		`price`='$price',
	// 		`item_description`='$item_description',
	// 		`item_image`='$name'
	// 		WHERE `id`='$id'";

	// $query=mysqli_query($conn, $sql);

	// if (!$query){
	// 	echo "<script> alert('Failed to Connect'); </script>";
	// }else{
	// 	echo "<script> alert('Inserted Successfully'); </script>";
	// 	echo "<script>
	// 		    window.location.replace('item_detail.php');
	// 		</script>";
	// }

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

});
   </script>

<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

	    $("#upload_image").change(function(){
	        readURL(this);
	    });
	    
	        
	    $('#clear-image').on({'click': function(){

	        $('#image_show').attr('src','');
	    	}
		});
</script>