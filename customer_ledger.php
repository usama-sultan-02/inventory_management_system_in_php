<?php
session_start();
	
	if(!isset($_SESSION['id']))
	{
		header('location:index.php');
		exit;
	}
 
    include('conn.php');

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

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container "><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('sidebar.php'); ?>

	<div class="main-content" >
				
		<?php include('header.php'); ?>
		
		<hr />
		
		<div class="row">
			<div class="col-md-12">
				
				<script type="text/javascript">
// 		jQuery( document ).ready( function( $ ) {
// 			var $table4 = jQuery( "#table-4" );
			
// 			$table4.DataTable( {
// 				dom: 'Bfrtip',
// 				buttons: [
// 					'copyHtml5',
// 					'excelHtml5',
// 					'csvHtml5',
// 					'pdfHtml5'
// 				]
// 			} );
// 		} );		
		</script>
									

		<div style="overflow-x:auto;">
		<table class="table table-bordered datatable responsive display nowrap" id="table-4" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<!-- <th>Debit</th>
					<th>Credit</th>
					<th>Sale Balance</th> --><!-- Due/Advanced -->
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
<?php
$sql=mysqli_query($conn, "SELECT * FROM `customer`");
while ($row=mysqli_fetch_array($sql)){
        $received="";
        $paid="";
        $balance="";
    ?>

	<tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $c_id=$row['customer_id']; ?></td>

            <?php   $qury = "SELECT * FROM `customer_ledger` WHERE `customer_id`='$c_id'";
                    $sqll=mysqli_query($conn, $qury);
                    while ($rows=mysqli_fetch_array($sqll)){
                        $received=$rows["debit"];
                        $paid=$rows["credit"];
                        $balance=$rows["sale_balance"];
                        } ?>

            <td><?php echo $row['customer_name']; ?></td>
            <!-- <td><?php// echo $received; ?></td>
            <td><?php //echo $paid; ?></td>
            <td><?php //echo $balance; ?></td> -->
            <td>
                    	<a href="customer_ledger_calculate.php?customer_id=<?php echo $row['id']; ?>" name="edit" id="" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						
                    </td>
            
            
        </tr>
<?php
}
?>
                
			</tbody>
		</table>
	</div>
				
				
			</div>
		</div>


    <div class="modal fade" id="modal-6"  role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Customer Ledger</h4>
				</div>
				
				<div class="modal-body">
				
                    <form role="form" class="form-horizontal form-groups-bordered" id="form" method="post">
                        <div class="col-sm-12 row">
                            
                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label" style="text-align: left;">Received</label>
                                
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="received" name="received" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="col-sm-4 control-label" style="text-align: left;">Paid</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="paid" name="paid" placeholder="Customer Name" style="border: 1px solid #ccc;" autocomplete="off" value="" required="">
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <div class="col-sm-8">
                                    <button type="submit" name="submit" class="btn btn-info">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- <table class="table table-bordered datatable">
						<thead>
							<tr>
								<th>Item ID</th>
								<th>Item Name</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Total Price</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody class="table_body" id="table_body">
							<tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
						</tbody>
					</table> -->
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-info">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>



	</div>
		
	<?php //include('chat.php'); ?>

</div>


	<link rel="stylesheet" href="assets/js/datatables/datatables.css">
	<!-- <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css"> -->

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


	<!-- <script src="assets/js/datatables/datatables.js"></script>
	<script src="assets/js/select2/select2.min.js"></script> -->

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
        
        $(document).ready(function() {

            $('#table-4').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );


            $('.dataTable').on('click', 'tbody tr', function() {

            //get textContent of the TD
            //console.log('TD cell textContent : ', this.textContent)

            //var currentRowData = d_table.row(this).data();
            //var rowclickid=currentRowData[1];

            // var id = $(this).attr("id");
            // var obj = this;
            
            // $.ajax({
            //     url:"ajax.php",
            //     method:"POST",
            //     data:{rowclickid:rowclickid},
            //     success:function(data){
            //         $('#table_body').html(data);
            //     }
            // });

            //$("#modal-6").modal("show");
            //alert(currentRowData[0]);
            });

        } );
     </script>

</body>
</html>

<script type="text/javascript">
   	$(document).on('click', '.delete', function(){

   	// 	var id = $(this).attr("id");
   	// 	var obj = this;
	//    if(confirm("Are you sure you want to Delete this?"))
	//    {
	//     $.ajax({
	//      url:"delete.php",
	//      method:"POST",
	//      data:{customer_delete:id},
	//      success:function(data){
	//      	result = $.trim(data);
    //                 if (result == 'Deleted Successfuly'){
    //                     alert(data);
    //                     window.location.reload();
    //                     $(obj).parent().parent().remove();
    //                 }
    //                 else{
    //                     alert('Request Failed'); 
    //                 }
	//      }
	//     });
	//    console.log('inside if');
	//    }
  });
   </script>