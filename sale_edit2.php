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
    $digit="s-".$dig;

    $in=mt_rand(100000,999999);
    $inv="#".$in;
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

    <!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script> -->

    

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
							Sales
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
                            $id=$_GET['sale_id'];
                    $sql="SELECT * FROM sale WHERE id=$id";
                    $run_sql=mysqli_query($conn,$sql);
                  while($rows=mysqli_fetch_array($run_sql)){
                            $sale_id=$rows['sale_id'];
                            $date=$rows['date']; 
                            $sale_to=$rows['sale_to'];
                            }

							//echo "<script> alert('$sale_to'); </script>";
                            
						?>



        <script>
        $(document).ready(function(){
        var sale_id="<?php echo $sale_id; ?>";
                    $.ajax({
                        url:"ajax.php",
                        method:"POST",
                        data:{fetch_sale_items:sale_id},
                        success:function(data){
                            result = $.trim(data);
                            $('.items').html(data);
                            
                        }
                    });


                $("#test").click(function(e){
                    alert('display');
                
                });
                });
            </script>


					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" id="form" method="post" enctype="multipart/form-data">
							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
									<label for="" class="col-sm-4 control-label" style="text-align: left;">Sales Code</label>
									
									<div class="col-sm-8">
										<input type="text" class="form-control" id="sale_code" name="sale_code" style="border: 1px solid #ccc;" autocomplete="off" value="<?php echo $sale_id; ?>"  readonly="">
									</div>
								</div>

								<div class="form-group col-sm-6">
									<label class="col-sm-4 control-label" style="text-align: left;">Item Name</label>
									
									<div class="col-sm-8">
										<!-- <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" style="border: 1px solid #ccc;" autocomplete="off" value="" required=""> -->

										<select name="item_id" id="item_id" class="select2" data-allow-clear="true" data-placeholder="Select Item" style="">
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
											<div class="input-group" id="date_input_group">
										<input type="text" class="form-control datepicker" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" value="<?php echo $date; ?>" id="date" name="date" autocomplete="off" required>

										<!-- <input type="text" class="form-control datepicker" data-start-view="1" data-format="yyyy-m-dd" style="border: 1px solid #ccc;" placeholder="Select Date" id="date" name="date" autocomplete="off" required> -->
										
										<div class="input-group-addon" id="calender_icon" style="border: 1px solid #ccc;" disabled>
											<a href="#"><i class="entypo-calendar"></i></a>
										</div>
									</div>
										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Quantity</label>
										
										<div class="col-sm-8">
											<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" style="border: 1px solid #ccc;" autocomplete="off" value="">

										</div>
									</div>

							</div>



							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
										<label for="address" class="col-sm-4 control-label" style="text-align: left;">Unit Price</label>
										
										<div class="col-sm-8">
											<input type="text" class="form-control" id="unit_price" name="unit_price" placeholder="Unit Price" style="border: 1px solid #ccc;" autocomplete="off" value="">

										</div>
									</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Total Price</label>
										
										<div class="col-sm-8">
											<input type="text" class="form-control" id="total_price" name="total_price" placeholder="Total Price" style="border: 1px solid #ccc;" readonly>

										</div>
									</div>

							</div>


							<div class="col-sm-12 row">
								<div class="form-group col-sm-6">
									<label for="address" class="col-sm-4 control-label" style="text-align: left;">Sale To</label>
									
									<div class="col-sm-8" id="sale_to_div">

										<select name="sale_to" id="sale_to" class="select2" data-allow-clear="true" data-placeholder="Select Customer" style="" required>
											<option></option>
											<optgroup label="Customer List">
												<?php 
												$sql=mysqli_query($conn,"SELECT * FROM `customer`");
												while ($row=mysqli_fetch_array($sql)){  ?>
												<option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_name']; ?></option>
													<?php  }  ?>
											</optgroup>
										</select>

									</div>
								</div>

									<div class="form-group col-sm-6">
										<label class="col-sm-4 control-label" style="text-align: left;">Description</label>
										
										<div class="col-sm-8">
											<textarea class="form-control" id="sale_description" name="sale_description" placeholder="Description" style="border: 1px solid #ccc;" ></textarea>

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

	<div style="overflow-x:auto;">
		<table class="table table-bordered datatable responsive display nowrap" id="table-4" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Item Code</th>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Total Price</th>
					<th>Item Image</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody class="items">
				      
			</tbody>
		</table>
	</div>
							</div>
							<!-- <div id="animal_detail">
								
							</div> -->


							<div class="col-sm-12 row">
								<div class="form-group">
										<div class="col-sm-offset-4 col-sm-4">
											
											<button type="button" name="add_item" id="add_item" class="btn btn-orange" >Add Item</button>
											<button type="button" name="print" id="print" class="btn btn-danger" >Print</button>

											<input type="button" class="btn btn-primary" onclick="location.href='sale_list.php';" value="View" />
											<!-- <button type="submit" name="submit" class="btn btn-success">Sale</button> -->

											<button type="button" name="checkout" id="checkout" class="btn btn-warning popover-info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="ONCE you Add Items to this Sale (Order) Then After Checkout Your Sale will be added & you can print Invoice" data-original-title="Note:">Checkout</button>


											<!-- <button class="btn btn-primary popover-primary" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">I'm a Popover</button> -->
											
											
											
											
											
											<input type="hidden" id="item_stock_quantity"/>
										</div>
									</div>
								
							</div>
						</form>
					
					</div>
				
				</div>
				
			</div>
		</div>

	</div>


<style type="text/css">
/*@media print {
  .modal_content_body {
    position: absolute;
    z-index: 999999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
}*/



@media print {
		body * {
			visibility: hidden;
		}
		.modal-content * {
			visibility: visible;
			overflow: visible;
		}
		.main-page * {
			display: none;
		}
		.modal-footer * {
			display: none;
		}
		.modal {
			position: absolute;
			left: 0;
			top: 0;
			margin: 0;
			padding: 0;
			min-height: 550px;
			visibility: visible;
			overflow: visible !important; 
		}
		.modal-dialog {
			visibility: visible !important;
			overflow: visible !important; 
		}
	}
</style>


<!-- Invoice Modal -->
<div class="modal fade custom-width modal_content_body" id="modal-3" role="dialog">
		<div class="modal-dialog" style="width: 90%">
			<div class="modal-content">
				
				<!-- <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Full width</h4>
				</div> -->
				
				<div class="modal-body">
				
					<div class="invoice">
		
					<div class="row">
					
						<div class="col-sm-6 invoice-left">
						
							<a href="#">
								<img src="assets/images/laborator@2x.png" width="185" alt="" />
							</a>
							
						</div>
						
						<div class="col-sm-6 invoice-right">
								<h3>INVOICE NO. <?php echo $inv;?></h3>
								<span><?php
									date_default_timezone_set("Asia/Karachi");
									echo date("d-M-Y h:i:sa");
								?></span>
						</div>
					</div>
					
					
					<hr class="margin" />
					
				
					<div class="row">
					
						<div class="col-sm-3 invoice-left">
							<h4>Client</h4>
							<p id="invoice_customer_name"></p>
						</div>
					
						<div class="col-sm-3 invoice-left">
							<!-- <h4>&nbsp;</h4>
							1982 OOP
							<br />
							Madrid, Spain
							<br />
							+1 (151) 225-4183 -->
						</div> 
						
						<div class="col-md-6 invoice-right">
							<!-- <h4>Payment Details:</h4>
							<strong>V.A.T Reg #:</strong> 542554(DEMO)78
							<br />
							<strong>Account Name:</strong> FoodMaster Ltd
							<br />
							<strong>SWIFT code:</strong> 45454DEMO545DEMO -->

							<strong>Contact:</strong>   Samiullah
								<br />
								<strong>Mobile No:</strong> 092321-7191879
								<br />
								<strong>Email:</strong>     Info@vetementco.com
								<br />
								<strong>Address:</strong>   Vetement Showroom Opposite<br>FourStar Marrige Hall Sialkot Road Sambrial

						</div>
					</div>
					
					<div class="margin"></div>
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Item Code</th>
								<th>Item Name</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Total Price</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody id="invoice_table_body">
							
						</tbody>
					</table>
					
					<div class="margin"></div>
				
					<div class="row">
						<div class="col-sm-6">
							<div class="invoice-left">
								<!-- <strong>Contact:</strong>   Samiullah
								<br />
								<strong>Mobile No:</strong> 092321-7191879
								<br />
								<strong>Email:</strong>     Info@vetementco.com
								<br />
								<strong>Address:</strong>   Vetement Showroom Opposite FourStar Marrige Hall Sialkot Road Sambrial -->
								<table>
									<tbody>
										<tr >
											<td><strong>Contact: </strong></td>
											<td style="border-bottom: 1px solid #ccc;">Samiullah</td>
										</tr>
										<tr>
											<td><strong>Mobile No: </strong></td>
											<td style="border-bottom: 1px solid #ccc;">092321-7191879</td>
										</tr>
										<tr>
											<td><strong>Email: </strong></td>
											<td style="border-bottom: 1px solid #ccc;">Info@vetementco.com</td>
										</tr>
										<tr >
											<td><strong>Address: </strong></td>
											<td style="border-bottom: 1px solid #ccc;">Vetement Showroom Opposite FourStar<br>Marrige Hall Sialkot Road Sambrial</td>
										</tr>
										<tr>
											<td><br><br><br>
													<strong>Vetement:</strong>
												</td>
												<td><br><br><br> ________________</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="invoice-right">
								<ul class="list-unstyled">
									<li>
										Total amount: 
										<strong id="invoice_sub_total">$6,487</strong>
									</li>
									
									<!-- <li>
										Discount: 
										-----
									</li> -->
									<!-- <li>
										Grand Total:
										<strong>$7,304</strong>
									</li> -->
								</ul>
								<br />
								<a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
									Print Invoice
									<i class="entypo-doc-text"></i>
								</a>
								&nbsp;
								<a href="" target="_blank" class="btn btn-success btn-icon icon-left hidden-print" id="send_whatsapp">
									Send Invoice
									<i class="entypo-mail"></i>
								</a>
							</div>
						</div>
					</div>
				
				</div>
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-info">Save changes</button>
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

	//$item_code=$_POST['item_id'];
	$sale_code=$_POST['sale_code'];
	//$item_name=$_POST['item_name'];
	$date=$_POST['date'];
	//$quantity=$_POST['quantity'];
	//$unit_price=$_POST['unit_price'];
	//$total_price=$_POST['total_price'];
	$sale_to=$_POST['sale_to'];
	$sale_description=$_POST['sale_description'];

	//$sql="INSERT INTO `sale` (`id`, `item`, `date`, `quantity`, `unit_price`, `total_price`, `sale_to`, `description`) VALUES (NULL, '$item_code', '$date', '$quantity', '$unit_price', '$total_price', '$sale_to', '$sale_description')";

	$sql="INSERT INTO `sale` (`id`, `sale_id`, `date`, `sale_to`, `description`) VALUES (NULL, '$sale_code', '$date', '$sale_to', '$sale_description')";
	$query=mysqli_query($conn, $sql);

	if (!$query){
		echo "<script> alert('Failed to Connect'); </script>";
	}else{

		$sql2=mysqli_query($conn,"SELECT * FROM `sale_item` WHERE `sale_id`='$sale_code'");
		while($row2=mysqli_fetch_array($sql2)){
				
				$sale_item_id=$row2['item_id'];
				$sale_item_qty=$row2['qty'];
				//echo "<script> alert('Item Exist'+$sale_item_id); </script>";		


				$sql=mysqli_query($conn, "SELECT * FROM `stock` WHERE `item_code`='$sale_item_id'");
				$check=mysqli_num_rows($sql);
				while ($row=mysqli_fetch_array($sql)){
					$qty=$row['qty'];
				}
				if($check==1){
					//echo "<script> alert('Item Exist'); </script>";
					$update_qty=$qty-$sale_item_qty;//deducting from stock
					$stock_update="UPDATE `stock` SET `qty`='$update_qty' WHERE `item_code`='$sale_item_id'";
					$stock_update_query=mysqli_query($conn, $stock_update);
				}else{
					echo "<script> alert('Item Does Not Exist In Stock'); </script>";
					// $stock="INSERT INTO `stock` (`id`, `item_code`, `qty`) VALUES (NULL, '$item_code', '$quantity');";
					// $stock_query=mysqli_query($conn, $stock);
				}

				
		}

		echo "<script> alert('Data Inserted Successfully'); </script>";
		echo "<script> //window.location.replace('item_detail.php'); </script>";
		
			
	}
}
	
?>

<script type="text/javascript">
   	$(document).ready(function(){

  //$("#add_item").change(function(){
   	$("#add_item").click(function(e){
  	
		    //alert('add');
		    //var add_item=$("#add_item").val();
			
		    var item_id=$("#item_id").val();
		    var qty=$("#quantity").val();
		    var unit_price=$("#unit_price").val();
		    var total_price=$("#total_price").val();
		    var sale_code=$("#sale_code").val();

		    var date=$("#date").val();

			if(item_id=="" || qty=="" || unit_price=="" || date==""){
				alert("Please Fill all the Fields.")
			}else{

				$.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{item_id:item_id, qty:qty, unit_price:unit_price, total_price:total_price, sale_code:sale_code},
			     success:function(data){
			     	result = $.trim(data);
			     	$('.items').html(data);
					
			     }
		    });

				$('#sale_to').attr('readonly', true);
				$("#sale_to_div").hide();
				//$('#sale_to_div').css({ 'visibility': 'hidden' });

				$('#date').attr('readonly', true);
				$('#date_input_group').css({ 'visibility': 'hidden' });

				var item_id=$("#item_id").val(" ");
				var qty=$("#quantity").val(" ");
				var unit_price=$("#unit_price").val(" ");
				var total_price=$("#total_price").val(" ");


			}

	});






	$("#item_id").change(function(){
		var item_id_check_stock=$("#item_id").val();
		$.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{item_id_check_stock:item_id_check_stock},
			     success:function(data){
			     	result = $.trim(data);
			     	$('#item_stock_quantity').val(data);
			     }
		    });

				var qty=$("#quantity").val(" ");
				var unit_price=$("#unit_price").val(" ");
				var total_price=$("#total_price").val(" ");
	
	});


	$("#quantity").keyup(function(){
		var quantity=$("#quantity").val();
		var item_stock_quantity=$("#item_stock_quantity").val();
		
		if(parseInt(quantity) > parseInt(item_stock_quantity)){
			alert("Stock is Less then this Quantity");
			$("#quantity").val(" ");
		}else{
			//alert("Good to Go");
		}

		//var quantity=$("#quantity").val();
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



<script>
        
        $(document).ready(function() {



			function showrecord(){
				// $("#myModalData").modal("show");

			}

			function get_total_amount(sale_code){

				$.ajax({
				     url:"ajax.php",
				     method:"POST",
				     data:{get_total_amount:sale_code},
				     success:function(data){

				     	$('#invoice_sub_total').html(data);
				     }
				    });

			}
			
			
			function get_whatsapp_number(customer_id){

				$.ajax({
				     url:"ajax.php",
				     method:"POST",
				     data:{get_whatsapp_number:customer_id},
				     success:function(data){
						var whatsapp_link="https://api.whatsapp.com/send?phone="+data;
						$("#send_whatsapp").attr("href", whatsapp_link);
				     	//$('#invoice_sub_total').html(data);
				     }
				    });

			}


			$('#print').on({'click': function(){
					var invoice=$("#sale_code").val();
					$.ajax({
				     url:"ajax.php",
				     method:"POST",
				     data:{invoice:invoice},
				     success:function(data){

				     	get_total_amount(invoice);
						 var customer_id=$("#sale_to").val();
						get_whatsapp_number(customer_id)
				     	$('#invoice_table_body').html(data);

				     }
				    });

		        	 $("#modal-3").modal("show");
		    	}
		    });


			$("#sale_to").change(function(){
				var sale_to_customer=$("#sale_to").val();
				$.ajax({
				     url:"ajax.php",
				     method:"POST",
				     data:{sale_to_customer:sale_to_customer},
				     success:function(data){

				     	$('#invoice_customer_name').html(data);

				     }
				    });
			});






			//$("#checkout").click(function(){
			$('#checkout').on({'click': function(){

				var sale_to=$("#sale_to").val();
				var sale_code=$("#sale_code").val();
				var date=$("#date").val();
				var description=$("#sale_description").val();

				if(sale_to=="" || date=="" ){
					alert("Please Fill all the Fields.")
				}else{

					$.ajax({
							url:"ajax.php",
							method:"POST",
							data:{sale_checkout:sale_code, sale_to:sale_to, date:date, sale_description:description},
							success:function(data){
								result = $.trim(data);

								$("#add_item").hide();
								$("#checkout").hide();
								checkout_print();
								//$('#item_stock_quantity').val(data);
							}
						});
				}

						// var qty=$("#quantity").val(" ");
						// var unit_price=$("#unit_price").val(" ");
						// var total_price=$("#total_price").val(" ");
				}
			});


			function checkout_print(){

				var invoice=$("#sale_code").val();
					$.ajax({
				     url:"ajax.php",
				     method:"POST",
				     data:{invoice:invoice},
				     success:function(data){

				     	get_total_amount(invoice);
						 var customer_id=$("#sale_to").val();
						get_whatsapp_number(customer_id)
				     	$('#invoice_table_body').html(data);


				     }
				    });

		        	 $("#modal-3").modal("show");

			}


        } );
     </script>
<!-- 

<script type="text/javascript">
   	$(document).on('click', '.sale_item_delete', function(){
		alert('sale_item_delete');
   		var id = $(this).attr("id");
   		var obj = this;
	   if(confirm("Are you sure you want to Delete this?"))
	   {
	    $.ajax({
	     url:"delete.php",
	     method:"POST",
	     data:{sale_item_delete:id},
	     success:function(data){
	     	result = $.trim(data);
                    if (result == 'Deleted Successfuly'){
                        alert(data);
                        //window.location.reload();
                        $(obj).parent().parent().remove();
                    }
                    else{
                        alert('Request Failed'); 
                    }
					
	     }
	    });
	   console.log('inside if');
	   }
  });



   	
   </script> -->