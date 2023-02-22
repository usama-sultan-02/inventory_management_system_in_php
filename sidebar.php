<?php 
		

	// $sql="SELECT * FROM user WHERE id=".$_SESSION['id'];
 //        $run_sql=mysqli_query($conn,$sql);
 //        while($rows=mysqli_fetch_array($run_sql)) {
 //        	$name=$rows['username'];
 //        	//$image=$rows['image'];
 //        	# code...
 //        }
    // if (empty($image)){
    // 	$image="assets/images/blank.png";
    // 	# code...
    // }
?>
<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">
 
				<!-- logo -->
				<div class="logo">
					<a href="admin.php">
						 <!--<img src="assets/images/logo@2x.png" width="120" alt="" /> -->
						 <!-- <img src="assets/images/exxx2.png" width="120" alt="" /> -->
						 <h2 style="color: white;">Vetement</h2>
						<!-- <label>Vetement</label> -->
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon "><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li class="active active">
					<a href="admin.php">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
					
				</li>

					<li class="has-sub">
						<a href="#">
							<i class="entypo-layout"></i>
							<span class="title">Item</span>
						</a>
						<ul>
							<li class="">
								<a href="add_item.php">
									<span class="title">Add Item</span>
								</a>
							</li>

							<li class="">
								<a href="item_detail.php">
									<span class="title">Item Detail</span>
								</a>
							</li>
						</ul>
					</li>
					
					
					

					<li class="has-sub">
						<a href="#">
							<i class="entypo-user"></i>
							<span class="title">Customer</span>
						</a>
						<ul>
							<li class="">
							<a href="customer.php">
								<span class="title">Add Customer</span>
							</a>
							</li>

							<li class="">
							<a href="customer_list.php">
								<span class="title">Customer Detail</span>
							</a>
							</li>
							
							<li class="">
							<a href="customer_ledger.php">
								<span class="title">Customer Ledger</span>
							</a>
							</li>
							
						</ul>
					</li>



					<li class="has-sub">
						<a href="#">
							<i class="entypo-basket"></i>
							<span class="title">Purchasing</span>
						</a>
						<ul>
							
							<li class="">
								<a href="purchase.php">
									<span class="title">Purchase</span>
								</a>
							</li>
							<li class="">
								<a href="purchase_list.php">
									<span class="title">Purchase List</span>
								</a>
							</li>
						</ul>
					</li>

					
						
												

							

                     <li class="has-sub">
								<a href="#">
									<i class="entypo-basket"></i>
									<span class="title">Sales</span>
								</a>
								<ul>
									<li class="has-sub">
										<li class="">
											<a href="sale.php">
												<span class="title">Add Sale</span>
											</a>
										</li>

										<li class="">
											<a href="sale_list.php">
												<span class="title">Sale Record</span>
											</a>
										</li>
									</li>
								
								</ul>
							</li>


							 <li class="has-sub">
								<a href="#">
									<i class="entypo-basket"></i>
									<span class="title">Stock</span>
								</a>
								<ul>
									<li class="has-sub">
										<li class="">
											<a href="stock_in.php">
												<span class="title">Stock IN</span>
											</a>
										</li>

										<li class="">
											<a href="stock.php">
												<span class="title">Total Stock</span>
											</a>
										</li>
									</li>
								
								</ul>
							</li>

							<li class="has-sub">
								<a href="#">
									<i class="entypo-basket"></i>
									<span class="title">Payment/Expense</span>
								</a>
								<ul>
									<li class="has-sub">
										<li class="">
											<a href="payment.php">
												<span class="title">Payment/Expense</span>
											</a>
										</li>

										<li class="">
											<a href="payment_list.php">
												<span class="title">Payment/Expense List</span>
											</a>
										</li>
									</li>
								
								</ul>
							</li>

					

				<li class="">
					<a href="reports.php">
						<i class="entypo-list"></i>
						<span class="title">Report</span>
					</a>
					
				</li>
				
				<li class="">
					<a href="setting.php">
						<i class="entypo-cog"></i>
						<span class="title">Settings</span>
					</a>
					
				</li>

				<li class="">
					<a href="index.php?logout=true">
						<i class="entypo-logout"></i>
						<span class="title">Logout</span>
					</a>
					
				</li>

			</ul>
			
		</div>

	</div>