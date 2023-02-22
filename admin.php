<?php
session_start();
	
	if(!isset($_SESSION['id']))
	{
		session_destroy();
		header("location:login.php");
		exit;
	}
    require_once('conn.php');
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

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	
	
	
	<style>
		div.chartWrapper {
			position: relative;
			overflow: auto;
			width: 100%;
		}

		div.chartContainer {
			overflow-x: scroll;
			overflow-y: hidden;
			width: 800px;

		}

		#myChart{
		  width: 100%;
		}
	  </style>
	



</head>
<body class="page-body  page-fade" data-url="http://neon.dev" >

<div class="page-container" ><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('sidebar.php'); ?>

	<!-- <div class="main-content" style="background-image: url('assets/images/onee.jpg'); background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: cover;"> -->

  <div class="main-content">
				
		<?php include('header.php'); ?>
		
		<hr />
		
		
		<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.success("Welcome to Dairy Form Application","", opts);
			}, 3000);
		
		
			// // Sparkline Charts
			// $('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
			// $('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
			// $('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
			// $('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
			// $('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
			// $('.linechart').sparkline();
			// $('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
			// $('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );
		
		
			// $(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
			// 	type: 'bar',
			// 	barColor: '#485671',
			// 	height: '80px',
			// 	barWidth: 10,
			// 	barSpacing: 2
			// });
		
		
			// // JVector Maps
			// var map = $("#map");
		
			// map.vectorMap({
			// 	map: 'europe_merc_en',
			// 	zoomMin: '3',
			// 	backgroundColor: '#383f47',
			// 	focusOn: { x: 0.5, y: 0.8, scale: 3 }
			// });
		
		
		
			// // Line Charts
			// var line_chart_demo = $("#line-chart-demo");
		
			// var line_chart = Morris.Line({
			// 	element: 'line-chart-demo',
			// 	data: [
			// 		{ y: '2006', a: 100, b: 90 },
			// 		{ y: '2007', a: 75,  b: 65 },
			// 		{ y: '2008', a: 50,  b: 40 },
			// 		{ y: '2009', a: 75,  b: 65 },
			// 		{ y: '2010', a: 50,  b: 40 },
			// 		{ y: '2011', a: 75,  b: 65 },
			// 		{ y: '2012', a: 100, b: 90 }
			// 	],
			// 	xkey: 'y',
			// 	ykeys: ['a', 'b'],
			// 	labels: ['October 2013', 'November 2013'],
			// 	redraw: true
			// });
		
			// line_chart_demo.parent().attr('style', '');
		
		
			// // Donut Chart
			// var donut_chart_demo = $("#donut-chart-demo");
		
			// donut_chart_demo.parent().show();
		
			// var donut_chart = Morris.Donut({
			// 	element: 'donut-chart-demo',
			// 	data: [
			// 		{label: "Download Sales", value: getRandomInt(10,50)},
			// 		{label: "In-Store Sales", value: getRandomInt(10,50)},
			// 		{label: "Mail-Order Sales", value: getRandomInt(10,50)}
			// 	],
			// 	colors: ['#707f9b', '#455064', '#242d3c']
			// });
		
			// donut_chart_demo.parent().attr('style', '');
		
		
			// // Area Chart
			// var area_chart_demo = $("#area-chart-demo");
		
			// area_chart_demo.parent().show();
		
			// var area_chart = Morris.Area({
			// 	element: 'area-chart-demo',
			// 	data: [
			// 		{ y: '2006', a: 100, b: 90 },
			// 		{ y: '2007', a: 75,  b: 65 },
			// 		{ y: '2008', a: 50,  b: 40 },
			// 		{ y: '2009', a: 75,  b: 65 },
			// 		{ y: '2010', a: 50,  b: 40 },
			// 		{ y: '2011', a: 75,  b: 65 },
			// 		{ y: '2012', a: 100, b: 90 }
			// 	],
			// 	xkey: 'y',
			// 	ykeys: ['a', 'b'],
			// 	labels: ['Series A', 'Series B'],
			// 	lineColors: ['#303641', '#576277']
			// });
		
			// area_chart_demo.parent().attr('style', '');
		
		
		
		
			// // Rickshaw
			// var seriesData = [ [], [] ];
		
			// var random = new Rickshaw.Fixtures.RandomData(50);
		
			// for (var i = 0; i < 50; i++)
			// {
			// 	random.addData(seriesData);
			// }
		
			// var graph = new Rickshaw.Graph( {
			// 	element: document.getElementById("rickshaw-chart-demo"),
			// 	height: 193,
			// 	renderer: 'area',
			// 	stroke: false,
			// 	preserve: true,
			// 	series: [{
			// 			color: '#73c8ff',
			// 			data: seriesData[0],
			// 			name: 'Upload'
			// 		}, {
			// 			color: '#e0f2ff',
			// 			data: seriesData[1],
			// 			name: 'Download'
			// 		}
			// 	]
			// } );
		
			// graph.render();
		
			// var hoverDetail = new Rickshaw.Graph.HoverDetail( {
			// 	graph: graph,
			// 	xFormatter: function(x) {
			// 		return new Date(x * 1000).toString();
			// 	}
			// } );
		
			// var legend = new Rickshaw.Graph.Legend( {
			// 	graph: graph,
			// 	element: document.getElementById('rickshaw-legend')
			// } );
		
			// var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
			// 	graph: graph,
			// 	legend: legend
			// } );
		
			// setInterval( function() {
			// 	random.removeData(seriesData);
			// 	random.addData(seriesData);
			// 	graph.update();
		
			// }, 500 );
		});
		
		
		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>
		
		
		<div class="row">
			<div class="col-sm-3 col-xs-6" id="animal_tile">
		<?php 
			include('conn.php');
				$count="";
        		$sql="SELECT * FROM `items`";
        		if ($result=mysqli_query($conn,$sql))
              	{
              		$count=mysqli_num_rows($result);
            	}
        	?>
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $count; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3>Total Items</h3>
					<!-- <p>so far in our blog, and our website.</p> -->
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6" id="customer_tile">
		
				<div class="tile-stats tile-blue">
					<?php 
			include('conn.php');
				$count="";
        		$sql="SELECT * FROM `sale`";
        		if ($result=mysqli_query($conn,$sql))
              	{
              		$count=mysqli_num_rows($result);
            	}
        	?>
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $count ?>" data-postfix="" data-duration="1500" data-delay="600"></div>
		
					<h3>Customers</h3>
					<!--<p>this is the average value.</p>-->
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6" id="vendor_tile">
					<?php 
			include('conn.php');
				$count="";
        		$sql="SELECT * FROM `items`";
        		if ($result=mysqli_query($conn,$sql))
              	{
              		$count=mysqli_num_rows($result);
            	}
        	?>
		
				<div class="tile-stats tile-black">
					<div class="icon"><i class="entypo-newspaper"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $count ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3>Vendors</h3>
					<!--<p>messages per day.</p>-->
				</div>
		
			</div>
		
			<!-- <div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
					<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3>Subscribers</h3>
					
				</div>
		
			</div> -->
		</div>
        	


		<div class="col-md-12">
			<hr>
			
		</div>

		<div class="col-md-12">

				<div class="row">
			<div class="col-sm-3">
			
				<a href="sales_record.php"><div class="tile-title tile-primary">
					
					<div class="icon">
						<i class="entypo-basket"></i>
					</div>
					
					<div class="title">
						<h3>Sales</h3>
						<p>Quick Access To Sales</p>
					</div>
				</div>
				</a>
			</div>

			<div class="col-sm-3">
			
				<a href="purchase.php"><div class="tile-title tile-blue">
					
					<div class="icon">
						<i class="entypo-bag"></i>
					</div>
					
					<div class="title">
						<h3>Purchase</h3>
						<p>Quick Access To Purchase</p>
					</div>
				</div>
				</a>
			</div>

			<div class="col-sm-3">
			
				<a href="chart_of_account.php"><div class="tile-title tile-primary">
					
					<div class="icon">
						<i class="entypo-chart-bar"></i>
					</div>
					
					<div class="title">
						<h3>Chart Of Account</h3>
						<p>Quick Access To COA</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-sm-3">
			
				<a href="customer.php"><div class="tile-title tile-blue">
					
					<div class="icon">
						<i class="entypo-user"></i>
					</div>
					
					<div class="title">
						<h3>Customer</h3>
						<p>Quick Access To Customer</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-sm-3">
			
				<a href="supplier.php"><div class="tile-title tile-blue">
					
					<div class="icon">
						<i class="entypo-users"></i>
					</div>
					
					<div class="title">
						<h3>Vendor</h3>
						<p>Quick Access To Vendor</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-sm-3">
			
				<a href="vendor_payment.php"><div class="tile-title tile-black">
					
					<div class="icon">
						<i class="entypo-cc-nc"></i>
					</div>
					
					<div class="title">
						<h3>Vendor Payments</h3>
						<p>Quick Access To Vendor</p>
					</div>
				</div>
				</a>
			</div>

				<div class="col-sm-3">
			
				<a href="services.php"><div class="tile-title tile-blue">
					
					<div class="icon">
						<i class="entypo-bucket"></i>
					</div>
					
					<div class="title">
						<h3>Services</h3>
						<p>Quick Access To Services</p>
					</div>
				</div>
				</a>

			</div>
			<div class="col-sm-3">
			
				<a href="payment_collection.php"><div class="tile-title tile-black">
					
					<div class="icon">
						<i class="entypo-cc-nc-eu"></i>
					</div>
					
					<div class="title">
						<h3>Payment Collection</h3>
						<p>Quick Access To Collection</p>
					</div>
				</div>
				</a>
			</div>
			
			
			
			
			
			
			
				
				
		</div>
		
			
				<div>
					
				</div>



		</div>
		
		
		
		<div class="col-md-12">
			<div class="chartWrapper">
				<div class="chartContainer" >
				  <!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->
				  <canvas id="myChart" ></canvas>
				</div>
				<!-- <canvas id="myChartAxis" height="300" width="0"></canvas>  -->
			  </div>
		</div>
		
		
		
	



	</div>
	
</div>

	<!-- Bottom scripts (common) -->
	<link rel="stylesheet" href="assets/js/datatables/datatables.css">
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/datatables/datatables.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>
<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table4 = jQuery( "#customer_tables" );
			
			$table4.DataTable( {
				dom: 'Bfrtip',
				buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5'
				]
			} );
		} );	
		jQuery( document ).ready( function( $ ) {
			var $table4 = jQuery( "#userTable" );
			
			$table4.DataTable( {
				dom: 'Bfrtip',
				buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5'
				]
			} );
		} );	
		jQuery( document ).ready( function( $ ) {
			var $table4 = jQuery( "#vendor" );
			
			$table4.DataTable( {
				dom: 'Bfrtip',
				buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5'
				]
			} );
		} );
		</script>
<script type="text/javascript">
	$(document).ready(function(){
               $("#animal_tile").click(function(){		        
		           if ($("#animal_table").is(":visible")){
		           	$("#animal_table").hide();
		           }else if($("#animal_table").is(":hidden")){
		           	$("#animal_table").show();
		           }
		        
		       }); 

		       $("#customer_tile").click(function(){		        
		           if ($("#customer_table").is(":visible")){
		           	$("#customer_table").hide();
		           }else if($("#customer_table").is(":hidden")){
		           	$("#customer_table").show();
		           }
		        
		       });   $("#vendor_tile").click(function(){		        
		           if ($("#vendor_table").is(":visible")){
		           	$("#vendor_table").hide();
		           }else if($("#vendor_table").is(":hidden")){
		           	$("#vendor_table").show();
		           }
		        
		       });

		       
			
			
			});
</script>

	<?php
		$sql=mysqli_query($conn, "select * from `items`");
		while($row=mysqli_fetch_array($sql)){
		  $item_code=$row['item_code'];
		  //$item[]=$row['item_code'];
		  $item[]=$row['item_name'];

		  $sql2=mysqli_query($conn, "select * from `stock` where `item_code`='$item_code'");
		  while($rows=mysqli_fetch_array($sql2)){
			$item_qty[]=$rows['qty'];
		  }

		}

		//print_r($item);

	  ?>

<script>

	var xValues = new Array();
      <?php foreach($item as $key => $val){ ?>
          xValues.push('<?php echo $val; ?>');
      <?php } ?>
  
  
  var yValues = new Array();
      <?php foreach($item_qty as $key => $val){ ?>
          yValues.push('<?php echo $val; ?>');
      <?php } ?>


	var barColors=[], tds='';
	  for( var r=100; r<256; r+=50 ){
		  for( var g=10; g<256; g+=70 ){
			  for( var b=10; b<256; b+=170){
				  var c="rgb("+r+","+g+","+b+")";
				  tds+="<p style='display:inline-block;margin:0;width:32px;height:32px;background:"+c+"'></p>";
				  barColors.push(c);
			  }        
		  }
	  } 
	
	

	 new Chart("myChart", {
		type: "bar",
		data: {
		  labels: xValues,
		  datasets: [{
			backgroundColor: barColors,
			data: yValues
			
		  }]
		},
		options: {
		  legend: {display: false},
		  title: {
			display: true,
			text: "Items Quantity in Stock"
		  }
		  
		}
	  });

</script>