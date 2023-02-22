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

				<div class="col-sm-6 col-xs-6" id="sale">
				<?php 
					include('conn.php');
					$count="";
	        		$sql="SELECT * FROM `sale`";
	        		if ($result=mysqli_query($conn,$sql))
	              	{
	              		$count=mysqli_num_rows($result);
	            	}
	        	?>
					<div class="tile-stats tile-cyan">
						<div class="icon"><i class="entypo-chart-bar"></i></div>
						<!-- <div class="num" data-start="0" data-end="<?php echo $count; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div> -->
						<h3>Sales Report</h3>
					</div>
			
				</div>
			
				<div class="col-sm-6 col-xs-6" id="purchase">
					<div class="tile-stats tile-orange">
						<?php 
							include('conn.php');
							$count="";
			        		$sql="SELECT * FROM `purchase`";
			        		if ($result=mysqli_query($conn,$sql))
			              	{
			              		$count=mysqli_num_rows($result);
			            	}
				        ?>
						<div class="icon"><i class="entypo-users"></i></div>
						<!-- <div class="num" data-start="0" data-end="<?php echo $count ?>" data-postfix="" data-duration="1500" data-delay="600"></div> -->
						<h3>Purchase Report</h3>
						<!--<p>this is the average value.</p>-->
					</div>
				</div>
				
			</div>

		</div>

<!----------------------------------------Sale Report----------------------------------------------------->

		<div class="row" id="sale_report_panel">
			<div class="col-md-12">
				<div class="panel panel-default" data-collapsed="0">
					<div class="panel-heading">
						<div class="panel-title">
							<strong>Report</strong>
						</div>
						
						<div class="panel-options">
							<!-- <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> -->
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<!-- <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> -->
						</div>
					</div>
					
<!----------------------------------------Sale Report----------------------------------->
					<div class="panel-body" id="sale_panel_body" hidden="">
						
                        <div class="col-sm-12 row">
							<div class="form-group col-sm-4">
								<label class="col-sm-4 control-label" style="text-align: left;">From Date</label>
										
								<div class="col-sm-8">
									<div class="input-group"><!-- data-format="dd-m-yyyy" -->
									    <input type="text" class="form-control datepicker" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" id="from" name="from" autocomplete="off">
										
										<div class="input-group-addon" style="border: 1px solid #ccc;">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
								</div>
							</div>

                            <div class="form-group col-sm-4">
								<label class="col-sm-4 control-label" style="text-align: left;">To Date</label>
										
								<div class="col-sm-8">
									<div class="input-group">
										<input type="text" class="form-control datepicker" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" id="to" name="to" autocomplete="off">
										
										<div class="input-group-addon" style="border: 1px solid #ccc;">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
                        <div class="col-sm-12 row">
							<div style="overflow-x:auto;">
								<table class="table table-bordered datatable responsive display nowrap" id="table-4" style="width:100%">
									<thead>
										<tr>
											<th>Sale ID</th>
											<th>Date</th>
											<th>Sale To</th>
											<th>Customer Name</th>
											<th>Items Detail</th>
											<!-- <th>Quantity</th>
											<th>Unit Price</th>
											<th>Total Price</th> -->
										</tr>
									</thead>
									<tbody class="sale_report_body">
						
									</tbody>
								</table>
							</div>
						</div>
						
					
					</div>




<!-----------------------------------Pruchase Report------------------------------->

					<div class="panel-body" id="purchase_panel_body" hidden>
						
                        <div class="col-sm-12 row">
							<div class="form-group col-sm-4">
								<label class="col-sm-4 control-label" style="text-align: left;">From Date</label>
										
								<div class="col-sm-8">
									<div class="input-group"><!-- data-format="dd-m-yyyy" -->
									    <input type="text" class="form-control datepicker" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" id="purchase_from" name="purchase_from" autocomplete="off">
										
										<div class="input-group-addon" style="border: 1px solid #ccc;">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
								</div>
							</div>

                            <div class="form-group col-sm-4">
								<label class="col-sm-4 control-label" style="text-align: left;">To Date</label>
										
								<div class="col-sm-8">
									<div class="input-group">
										<input type="text" class="form-control datepicker" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" id="purchase_to" name="purchase_to" autocomplete="off">
										
										<div class="input-group-addon" style="border: 1px solid #ccc;">
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
                        <div class="col-sm-12 row">
							<div style="overflow-x:auto;">
								<table class="table table-bordered datatable responsive display nowrap" id="table-5" style="width:100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Item Name</th>
											<th>Date</th>
											<th>Quantity</th>
											<th>Unit Price</th>
											<th>Total Price</th>
											<th>Purchase From</th>
										</tr>
									</thead>
									<tbody class="purchase_report_body">
						
									</tbody>
								</table>
							</div>
						</div>
						
					
					</div>



<!------------------------------------------------------------------->






				
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


		<!--pasted on nov 2022-->
	
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/>
    
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    
    <script>
        
        // $(document).ready(function() {
        //     $('#table-4').DataTable( {
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     } );
        // } );
     </script>


</body>
</html>
<?php
include('conn.php');
if (isset($_POST['submit'])){

	$customer_id=$_POST['customer_id'];
	$customer_name=$_POST['customer_name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	//$item_description=$_POST['item_description'];


	

	$sql="INSERT INTO `customer` (`id`, `customer_id`, `customer_name`, `phone`, `address`) VALUES (NULL, '$customer_id', '$customer_name', '$phone', '$address');";

	$query=mysqli_query($conn, $sql);

	if (!$query){
		echo "<script> alert('Failed to Connect'); </script>";
	}else{
		echo "<script> alert('Inserted Successfully'); </script>";
		echo "<script>
			    //window.location.replace('item_detail.php');
			</script>";
	}
}
	
?>

<script type="text/javascript">
   	$(document).ready(function(){

  $("#from").change(function(){
		    
		    var from=$("#from").val();
		    var to=$("#to").val();
			//alert(from);

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{date_from:from, date_to:to},
			     success:function(data){
			     	result = $.trim(data);
			     	$('.sale_report_body').html(data);
					//console.log(data);
					//alert(data);
			     }
		    });
	});

	$("#to").change(function(){
		    
		    var from=$("#from").val();
		    var to=$("#to").val();
			//alert(from);
			//alert(to);

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{date_from:from, date_to:to},
			     success:function(data){
			     	result = $.trim(data);
			     	//$('.sale_report_body').html(data);
					 //console.log(data);
					 //alert(data);
			     	$('.sale_report_body').html(data);
				     	if ($.fn.DataTable.isDataTable('#table-4')){
	           				// Destroy existing table
			           		$('#table-4').DataTable().destroy();
				        };
				        //if success it will display the data
				        //$('.sale_report_body').html(data);

				        // Initialize the table
				        $('#table-4').DataTable({
				        	dom: 'Bfrtip',
			                buttons: [
			                    'copy', 'csv', 'excel', 'pdf', 'print'
			                ]
				        });

					}
				});
	});






	$("#sale").click(function(){
			//alert('click');
		    $("#sale_panel_body").show();
		    $("#purchase_panel_body").hide();

		});


	$("#purchase").click(function(){
			//alert('click');
		    $("#sale_panel_body").hide();
		    $("#purchase_panel_body").show();

		});









	$("#purchase_from").change(function(){
		    
		    var purchase_from=$("#purchase_from").val();
		    var purchase_to=$("#purchase_to").val();
			//alert(from);

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{purchase_date_from:purchase_from, purchase_date_to:purchase_to},
			     success:function(data){
			     	result = $.trim(data);
			     	$('.purchase_report_body').html(data);
					//console.log(data);
					//alert(data);
			     }
		    });
	});

	$("#purchase_to").change(function(){
		    
		    var purchase_from=$("#purchase_from").val();
		    var purchase_to=$("#purchase_to").val();
			//alert(purchase_from);
			//alert(to);

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{purchase_date_from:purchase_from, purchase_date_to:purchase_to},
			     success:function(data){
			     	result = $.trim(data);
			     	//$('.sale_report_body').html(data);
					 //console.log(data);
					 //alert(data);

				     	if ($.fn.DataTable.isDataTable('#table-5')){
	           				// Destroy existing table
			           		$('#table-5').DataTable().destroy();
				        };
				        //if success it will display the data
				        $('.purchase_report_body').html(data);

				        // Initialize the table
				        $('#table-5').DataTable({
				        	dom: 'Bfrtip',
			                buttons: [
			                    'copy', 'csv', 'excel', 'pdf', 'print'
			                ]
				        });

					}
				});
	});


	    // $('#table-4').DataTable( {
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     } );

});



   	// $(document).on('click', '#sale', function(){
   	// 	alert('hi');
   	// 	$("#sale_report_panel").show();

   	// });
   </script>