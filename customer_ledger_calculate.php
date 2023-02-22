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

    	//$id="";
		include('conn.php');
        $id=$_GET['customer_id'];
    	$sql="SELECT * FROM customer WHERE id=$id";
    	$run_sql=mysqli_query($conn,$sql);
  		while($rows=mysqli_fetch_array($run_sql)){
            $customer_id=$rows['customer_id'];
            $customer_name=$rows['customer_name'];  
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
	<script type="text/javascript">
   		$(document).ready(function(){
			var s_t="";
		    //alert('add');
		    var id="<?php echo $customer_id; ?>";
		    var p_id="<?php echo $customer_id; ?>";
		    //alert(id);

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{sale_ledger:id},
			     success:function(data){
			     	result = $.trim(data);
			     	$('.sale_ledger').html(data);
					cal();

			     }
		    });

			function cal(){
				$.ajax({
				     url:"ajax.php",
				     method:"POST",
				     data:{sale_ledger_cal:id},
				     success:function(data){
						s_t=$.trim(data);
				     	
				     	//$('#sale_total').html(data);
						
						//alert(s_t);
				     }
				    });
			}
		    


		    

		});
   </script>


   <script type="text/javascript">
   		$(document).ready(function(){

		    //alert('add');
		    var id="<?php echo $customer_id; ?>";
		    var p_id="<?php echo $customer_id; ?>";
		    //alert(p_id);

			     	// $.ajax({
					//      url:"ajax2.php",
					//      method:"POST",
					//      data:{purchase_ledger:p_id},
					//      success:function(data){
					//      	result = $.trim(data);
					//      	$('#purchase_ledger').html(data);
							
					//      }
				    // });
		    

		});
   </script>
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
							Customer Ledger Detail
						</div>
						
						<div class="panel-options">
							<!-- <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> -->
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<!-- <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> -->
						</div>
					</div>

					
					
					<div class="panel-body">

<!------------------------------Sale------------------------------------------------------>
	<!-- <div style="overflow-x:auto;">
		<table class="table table-bordered datatable responsive display nowrap" id="table-4" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>Debit</th>
					<th>Credit</th>
					<th>Balance</th>
				</tr>
			</thead>
			<tbody id="sale_ledger">
                
			</tbody>
		</table>
	</div> -->
	<label class="control-label" style="text-align: left;"><strong>Sale</strong></label>
	<div style="overflow-x:auto;">
		<table class="table table-bordered display" id="table-4" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>Debit</th>
					<th>Credit</th>
					<th>Balance</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody class="sale_ledger" >

                
			</tbody>
			<tfoot>
			    <tr>
			      <td></td>
			      <td></td>
			      <td></td>
			      <td></td>
			      <td></td>
			      <td><h3 id="sale_total"></h3></td>
			      <td></td>
			    </tr>
			  </tfoot>
		</table>
	</div>

						<br>
						<form role="form" class="form-horizontal form-groups-bordered">
							<div class="col-sm-12 row">
								<div class="form-group col-sm-3">
									<label class="col-sm-4 control-label" style="text-align: left;">Debit</label>
									
									<div class="col-sm-8">
										<input type="number" class="form-control" id="debit" name="debit" style="border: 1px solid #ccc;" autocomplete="off" value="" placeholder="Debit">
									</div>
								</div>

								<div class="form-group col-sm-3">
									<label class="col-sm-4 control-label" style="text-align: left;">Credit</label>
									
									<div class="col-sm-8">
										<input type="number" class="form-control" id="credit" name="credit" placeholder="Credit" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

									</div>
								</div>

								<div class="form-group col-sm-4">
									<label class="col-sm-4 control-label" style="text-align: left;">Balance</label>
									
									<div class="col-sm-8">
										<input type="number" class="form-control" id="sale_balance" name="sale_balance" placeholder="Sale Balance" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

									</div>
								</div>

								<div class="form-group col-sm-2">
									
									<div class="col-sm-8">
										<button type="button" name="add_debit_credit" id="add_debit_credit" class="btn btn-orange">Add</button>

									</div>
								</div>

							</div>

						</form>
<br>
<hr>
<br>
<br>
<br>







<!-----------------------------------Purchase--------------------------------->

<label class="control-label" style="text-align: left;"><strong>Purchase</strong></label>
<div style="overflow-x:auto;">
		<table class="table table-bordered display" id="table-5" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>Paid</th>
					<th>Payable</th>
					<th>Balance</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody id="purchase_ledger">
			<?php
					//$id=$_POST["purchase_ledger"];
					$sql=mysqli_query($conn, "SELECT * FROM `customer_ledger_purchase` WHERE `customer_id`='$customer_id'");
					$tp=0;
					$ttp=0;
					$paid=0;
					$payable=0;
					$balance=0;
					while ($row=mysqli_fetch_array($sql)){
					$customer_name="";
					$c_id=$row['id'];
					$qury = "SELECT * FROM `customer` WHERE `customer_id`='$customer_id'";
						$sql2=mysqli_query($conn, $qury);
						while ($rows=mysqli_fetch_array($sql2)){
						$customer_name=$rows["customer_name"];
						}
					?>

					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['customer_id']; ?></td>
						<td><?php echo $customer_name; ?></td>
						<td><?php echo $paid=$row['paid']; ?></td>
						<td><?php echo $payable=$row['payable']; ?></td>

						<!-- <?php /*$balance=($balance+$paid)-$payable; 
							if($balance>=0){
								$balance=0;
							} */ ?>
						<td><?php //echo $balance; ?></td> -->

						<td><?php echo $tp=$row['balance']; ?></td>

						<td><a href="#" name="delete" id="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left purchase_delete">
          				<i class="entypo-cancel"></i>
				              Delete
				            </a></td>
					</tr>

					<?php	$ttp+=$tp;
					}?>
                
			</tbody>
			<!-- <tfoot>
			    <tr>
			      <td></td>
			      <td></td>
			      <td></td>
			      <td></td>
			      <td></td>
			      <td><h3 id="purchase_total"><?php //echo $balance; ?></h3></td>
			    </tr>
			  </tfoot> -->
		</table>
	</div>

						<br>
						<form role="form" class="form-horizontal form-groups-bordered">
							<div class="col-sm-12 row">
								<div class="form-group col-sm-3">
									<label class="col-sm-4 control-label" style="text-align: left;">Paid</label>
									
									<div class="col-sm-8">
										<input type="number" class="form-control" id="paid" name="paid" style="border: 1px solid #ccc;" autocomplete="off" value="" placeholder="Paid">
									</div>
								</div>

								<div class="form-group col-sm-3">
									<label class="col-sm-4 control-label" style="text-align: left;">Payable</label>
									
									<div class="col-sm-8">
										<input type="number" class="form-control" id="payable" name="payable" placeholder="Payable" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

									</div>
								</div>

								<div class="form-group col-sm-4">
									<label class="col-sm-4 control-label" style="text-align: left;">Balance</label>
									
									<div class="col-sm-8">
										<input type="number" class="form-control" id="balance" name="balance" placeholder="Purchase Balance" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">

									</div>
								</div>

								<div class="form-group col-sm-2">
									
									<div class="col-sm-8">
										<button type="button" name="add_paid_payable" id="add_paid_payable" class="btn btn-orange">Add</button>

									</div>
								</div>

							</div>


						</form>




<br>
<!--------------------------------------------------------->

<br>
<br>
<br>


			<!-- <form role="form" class="form-horizontal form-groups-bordered">
				<div class="col-sm-12 row">
					<div class="col-sm-4">
						<button type="button" id="calculate" class="btn btn-orange">Calculate</button>
					</div>
					<div class="form-group col-sm-4">
						<label class="col-sm-4 control-label" style="text-align: left;">Receivable</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="paid" name="paid" style="border: 1px solid #ccc;" readonly>
						</div>
					</div>

					<div class="form-group col-sm-4">
						<label class="col-sm-4 control-label" style="text-align: left;">Payable</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="payable" name="payable" style="border: 1px solid #ccc;" readonly>

						</div>
					</div>

				</div>

			</form> -->



















					
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

	<!-- <link rel="stylesheet" href="assets/js/datatables/datatables.css">
	<script src="assets/js/datatables/datatables.js"></script> -->


<!--pasted on nov 2022-->
	
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/>
    
    <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    
    <script>
        
        $(document).ready(function() {

            // $('#table-4').DataTable( {
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf', 'print'
            //     ]
            // } );

            $('#table-5').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );

           
			    //$('table.display').DataTable();
			    $('#table-4').DataTable();
			

        } );
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
	$email=$_POST['email'];
	//$item_description=$_POST['item_description'];


	

	$sql="INSERT INTO `customer` (`id`, `customer_id`, `customer_name`, `phone`, `address`, `email`) VALUES (NULL, '$customer_id', '$customer_name', '$phone', '$address', '$email');";

	$query=mysqli_query($conn, $sql);

	if (!$query){
		echo "<script> alert('Failed to Connect'); </script>";
	}else{
		echo "<script> alert('Inserted Successfully'); </script>";
		echo "<script>
			    window.location.replace('customer_list.php');
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


  	$("#add_debit_credit").click(function(){
			//alert('click');
		    var debit=$("#debit").val();
		    var credit=$("#credit").val();
		    var sale_balance=$("#sale_balance").val();

		    var id="<?php echo $customer_id; ?>";

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{add_debit_credit:debit, credit:credit, sale_balance:sale_balance, c_id:id},
			     success:function(data){
			     	result = $.trim(data);
			     	//alert(result);
			     	//$('#animal_detail').html(data);
			     	$('#sale_ledger').html(data);
			     	window.location.reload(true);
			     }
		    });

		});
  	
	
	
	
	
	
		$("#add_paid_payable").click(function(){
			//alert('click');
		    var paid=$("#paid").val();
		    var payable=$("#payable").val();
		    var balance=$("#balance").val();
		    var id="<?php echo $customer_id; ?>";

		    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{add_paid_payable:paid, payable:payable, balance:balance, c_id:id},
			     success:function(data){
			     	result = $.trim(data);
			     	//alert(result);
			     	//$('#animal_detail').html(data);
			     	$('#purchase_ledger').html(data);
			     	window.location.reload(true);
			     }
		    });

		});
		
		
		
		$("#calculate").click(function(){
			//alert('click');
		    //var sale_total=s_t;
		    var sale_total=$('#sale_total').html();
		    var purchase_total="<?php echo $ttp; ?>";
			//alert(sale_total);
			//alert(purchase_total);

			if($sale_total<0){

			}

			
		    

		});

});
   </script>

   <script type="text/javascript">
   	$(document).on('click', '.sale_delete', function(){

   		var id = $(this).attr("id");
   		var obj = this;
	   if(confirm("Are you sure you want to Delete this?"))
	   {
	    $.ajax({
	     url:"delete.php",
	     method:"POST",
	     data:{sale_ledger_delete:id},
	     success:function(data){
	     	result = $.trim(data);
                    if (result == 'Deleted Successfuly'){
                        alert(data);
                        window.location.reload();
                        $(obj).parent().parent().remove();
                    }
                    else{
                        alert('Request Failed'); 
                    }
	      //$('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
	      //$('#user_data').DataTable().destroy();
	      //fetch_data();
	     }
	    });
	   console.log('inside if');
	   }
  });




   	$(document).on('click', '.purchase_delete', function(){

   		var id = $(this).attr("id");
   		var obj = this;
	   if(confirm("Are you sure you want to Delete this?"))
	   {
	    $.ajax({
	     url:"delete.php",
	     method:"POST",
	     data:{purchase_ledger_delete:id},
	     success:function(data){
	     	result = $.trim(data);
                    if (result == 'Deleted Successfuly'){
                        alert(data);
                        window.location.reload();
                        $(obj).parent().parent().remove();
                    }
                    else{
                        alert('Request Failed'); 
                    }
	      //$('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
	      //$('#user_data').DataTable().destroy();
	      //fetch_data();
	     }
	    });
	   console.log('inside if');
	   }
  });
   </script>