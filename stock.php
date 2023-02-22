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
	<link rel="icon" href="assets/images/favicon.ico">

	<title>Vetement</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="ServiceQ Admin Panel" />
	<meta name="author" content="" />
	
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href=" assets/css/bootstrap.css">
    <link rel="stylesheet" href=" assets/css/neon-core.css">
    <link rel="stylesheet" href=" assets/css/neon-theme.css">
    <link rel="stylesheet" href=" assets/css/neon-forms.css">
    <link rel="stylesheet" href=" assets/css/custom.css">

    <script src="assets/js/jquery-1.11.3.min.js"></script>

	<style>
		 img:hover {
			width: 300px;
			height: 300px;
			}
	</style>

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
					<th>Item Code</th>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Item Image</th>
				</tr>
			</thead>
			<tbody>
<?php
$sql=mysqli_query($conn, "SELECT * FROM `stock`");
while ($row=mysqli_fetch_array($sql)){

	$item_name_from_items="";
	$item_code=$row["item_code"];
      $qury = "SELECT * FROM `items` WHERE `item_code`='$item_code'";
      $sqll=mysqli_query($conn, $qury);
       while ($rows=mysqli_fetch_array($sqll)){
          $item_name_from_items=$rows["item_name"];
          $item_image_from_items=$rows["item_image"];
        }
		?>


	<tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['item_code']; ?></td>
            <td><?php echo $item_name_from_items; ?></td>
            <td><?php echo $row['qty']; ?></td>
			
			<td><img src="upload/<?php echo $item_image_from_items; ?>" width="40px" height="40px"></td>
           
            
        </tr>
<?php
}
?>
                
			</tbody>
		</table>
	</div>


	<!-- <form method="post">
		<button type="submit" name="export">Export</button>
	</form> -->


				
				
			</div>
		</div>

	</div>
		
	<?php //include('chat.php'); ?>

</div>


	<!-- <link rel="stylesheet" href="assets/js/datatables/datatables.css"> -->
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
<!-- 
	<script src="assets/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script> -->
	
	
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
            $('#table-4').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
     </script>

</body>
</html>

       <?php 
include("conn.php");
if(isset($_GET['del_id'])){
        $sql="DELETE FROM category where id='$_GET[del_id]'";
        $run_sql=mysqli_query($conn,$sql);
    
    if(!$sql)
		{
			
		}
	
		else
		{
			 echo "<script> alert('Deleted Successfully'); </script>";
             echo "<script> location='categories_list.php'; </script>";
			//echo "<script> location='customers.php'; </script>";
		}
    }


	// if(isset($_POST['export'])){
	// 	// exec("mysqldump vetement -u root -p   > output.sql");
	// 	EXPORT_DATABASE("localhost","root","","vetement"); 
	// }

	// function EXPORT_DATABASE($host,$user,$pass,$name, $tables=false, $backup_name=false)
	// { 
	// 	set_time_limit(3000); 
	// 	$mysqli = new mysqli($host,$user,$pass,$name); 
	// 	$mysqli->select_db($name); 
	// 	$mysqli->query("SET NAMES 'utf8'");
	// 	$queryTables = $mysqli->query('SHOW TABLES'); 
	// 	while($row = $queryTables->fetch_row()) { 
	// 		$target_tables[] = $row[0]; 
	// 	}	
	// 	if($tables !== false) {
	// 		 $target_tables = array_intersect( $target_tables, $tables); 
	// 		} 
	// 	$content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
	// 	foreach($target_tables as $table){
	// 		if (empty($table)){ continue; } 
	// 		$result	= $mysqli->query('SELECT * FROM `'.$table.'`');  	
	// 		$fields_amount=$result->field_count;  
	// 		$rows_num=$mysqli->affected_rows; 	
	// 		$res = $mysqli->query('SHOW CREATE TABLE '.$table);	
	// 		$TableMLine=$res->fetch_row(); 
	// 		$content .= "\n\n".$TableMLine[1].";\n\n";   
	// 		$TableMLine[1]=str_ireplace('CREATE TABLE `','CREATE TABLE IF NOT EXISTS `',$TableMLine[1]);
	// 		for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
	// 			while($row = $result->fetch_row())	{ //when started (and every after 100 command cycle):
	// 				if ($st_counter%100 == 0 || $st_counter == 0 )	{
	// 					$content .= "\nINSERT INTO ".$table." VALUES";}
	// 					$content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ 
	// 						$row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
	// 						if (isset($row[$j])){
	// 							$content .= '"'.$row[$j].'"' ;
	// 						}  else{$content .= '""';
	// 						}	   
	// 						if ($j<($fields_amount-1)){
	// 							$content.= ',';
	// 						}   
	// 					}        
	// 					$content .=")";
	// 				//every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
	// 				if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {
	// 					$content .= ";";
	// 				} else {
	// 					$content .= ",";
	// 				}	
	// 				$st_counter=$st_counter+1;
	// 			}
	// 		} 
	// 		$content .="\n\n\n";
	// 	}
	// 	$content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
	// 	$backup_name = $backup_name ? $backup_name : $name.'___('.date('H-i-s').'_'.date('d-m-Y').').sql';
	// 	ob_get_clean(); header('Content-Type: application/octet-stream');  header("Content-Transfer-Encoding: Binary");  header('Content-Length: '. (function_exists('mb_strlen') ? mb_strlen($content, '8bit'): strlen($content)) );    header("Content-disposition: attachment; filename=\"".$backup_name."\""); 
	// 	echo $content; exit;
	// }


?>