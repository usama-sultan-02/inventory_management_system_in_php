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

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

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
					<th>Sale ID</th>
					<th>Date</th>
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
<?php
$sql=mysqli_query($conn, "SELECT * FROM `sale`");
while ($row=mysqli_fetch_array($sql)){
		  $i_id=$row["sale_to"];
	      $qury = "SELECT * FROM `customer` WHERE `customer_id`='$i_id'";
	      $sqll=mysqli_query($conn, $qury);
	       while ($rows=mysqli_fetch_array($sqll)){
	          $cust_name=$rows["customer_name"];
	        }
	?>

	<tr ><!--	onclick="jQuery('#modal-7').modal('show');"	-->
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['sale_id']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['sale_to']; ?></td>
            <td><?php echo $cust_name; ?></td>
            <td>
                    	<a href="sale_edit.php?sale_id=<?php echo $row['id']; ?>" name="edit" id="" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						
                    </td>
            	<td>
                    	<a href="#" name="delete" id="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left delete">
							<i class="entypo-cancel"></i>
							Delete
						</a>
                    </td>
            
        </tr>
<?php
}
?>
                
			</tbody>
		</table>
	</div>







<!-- <div class="modal fade" id="myModalData" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center text-black">Add Catgeory</h3>
        </div>
        <div class="modal-body">
           <form  method="post" name="add_size_form">
  			</form>
           
        </div>
         
      </div>
      
    </div>
  </div> -->



<div class="modal fade" id="modal-7"  role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Sale Item</h4>
				</div>
				
				<div class="modal-body">
				
					<table class="table table-bordered datatable">
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
							
						</tbody>
					</table>
					
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-info">Save changes</button> -->
				</div>
			</div>
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

	<script src="assets/js/toastr.js"></script>

	<!-- <script src="assets/js/datatables/datatables.js"></script> -->
	<script src="assets/js/select2/select2.min.js"></script>

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


            var d_table=$('#table-4').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );


            // $('#table-4 tbody').on('click', 'tr', function () {
			//     var data = DataTable.row( this ).data();
			//       //alert( 'ID: ' + data.RecordID );
			//       alert( 'ID: ' + data.id );
			//   } );


            $('.dataTable').on('click', 'tbody tr', function() {

			  //get textContent of the TD
			  //console.log('TD cell textContent : ', this.textContent)

			  var currentRowData = d_table.row(this).data();
			  var rowclickid=currentRowData[1];


			  // var id = $(this).attr("id");
		   	  // var obj = this;
			   
			    $.ajax({
			     url:"ajax.php",
			     method:"POST",
			     data:{rowclickid:rowclickid},
			     success:function(data){

			     	$('#table_body').html(data);

			     	// result = $.trim(data);
		            //         if (result == 'Deleted Successfuly'){
		            //             alert(data);
		            //             window.location.reload();
		            //             $(obj).parent().parent().remove();
		            //         }
		            //         else{
		            //             alert('Request Failed'); 
		            //         }

			      //$('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
			      //$('#user_data').DataTable().destroy();
			      //fetch_data();
			     }
			    });
	   



			  $("#modal-7").modal("show");
			  //alert(currentRowData[0]);
			  //get the value of the TD using the API 
			  //console.log('value by API : ', table.cell({ row: this.parentNode.rowIndex, column : this.cellIndex }).data());
			});



			function showrecord(){
				// $("#myModalData").modal("show");

			}

        } );
     </script>

</body>
</html>

<script type="text/javascript">
   	$(document).on('click', '.delete', function(){

   		var id = $(this).attr("id");
   		var obj = this;
	   if(confirm("Are you sure you want to Delete this?"))
	   {
	    $.ajax({
	     url:"delete.php",
	     method:"POST",
	     data:{item_delete:id},
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