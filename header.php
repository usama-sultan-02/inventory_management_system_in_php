<?php 
	//session_start();
	
	// if(!isset($_SESSION['id'], $_SESSION['role']))
	// {
	// 	header('location:login.php?lmsg=true');
	// 	exit;
	// }

	include('conn.php');
	$image="";
	$sql="SELECT * FROM user WHERE id=".$_SESSION['id'];
        $run_sql=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_array($run_sql)) {
        	$name=$rows['username'];
        	
        }
    if (empty($image)){
    	$image="assets/images/blank.png";
    }

?>
<div class="row no_print">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo $image; ?>" alt="" class="img-circle" width="44" />
							<?php echo $name; ?>
						</a>
		
						<ul class="dropdown-menu">
		
							<!-- Reverse Caret -->
							<li class="caret"></li>
		
							<!-- Profile sub-links -->
							<li>
								<a href="setting.php">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>
		
							<!-- <li>
								<a href="#">
									<i class="entypo-mail"></i>
									Inbox
								</a>
							</li>
		
							<li>
								<a href="#">
									<i class="entypo-clipboard"></i>
									Tasks
								</a>
							</li> -->
						</ul>
					</li>
				</ul>

<!-- <script type="text/javascript">
//$(document).ready(function(){
    var user_id="<?php //echo $user_id; ?>";

    $.ajax({
        url:"ajax.php",
        method:"POST",
        data:{fetch_notification:user_id},
        success:function(data){
          $("#not").html(data);         
        }
      })
	
//});
   </script> -->

				

				<ul class="user-info pull-left pull-right-xs pull-none-xsm">
					<!-- Raw Notifications -->
					<!-- <li class="notifications dropdown">
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="entypo-bell"></i>
							<span class="badge badge-info">6</span>
						</a>
		
						<ul class="dropdown-menu">
							<li class="top">
								<p class="small">
									<a href="#" class="pull-right">Mark all Read</a>
									You have <strong>3</strong> new notifications.
								</p>
							</li>
							
							<li>
								<ul class="dropdown-menu-list scroller">

									<li class="notification-success">
										<a href="#">
											<i class="entypo-user-add pull-right"></i>
											
											<span class="line">
												<strong>New user registered</strong>
											</span>
											
											<span class="line small">
												30 seconds ago
											</span>
										</a>
									</li>									
									
								</ul>
							</li>
							
							<li class="external">
								<a href="#">View all notifications</a>
							</li>
						</ul>
					</li> -->

					<li id="not">
						
					</li>
		


					<!-- Message Notifications -->
					<!-- <li class="notifications dropdown">
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="entypo-mail"></i>
							<span class="badge badge-secondary">10</span>
						</a>
		
						<ul class="dropdown-menu">
							<li>
								<form class="top-dropdown-search">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Search anything..." name="s" />
									</div>
								</form>
								
								<ul class="dropdown-menu-list scroller">
									<li class="active">
										<a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
											</span>
											<span class="line">
												<strong>Luc Chartier</strong>
												- yesterday
											</span>
											<span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
										</a>
									</li>
									
									<li class="active">
										<a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
											</span>
											<span class="line">
												<strong>Salma Nyberg</strong>
												- 2 days ago
											</span>
											<span class="line desc small">
												Oh he decisively impression attachment friendship so if everything. 
											</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="external">
								<a href="mailbox.html">All Messages</a>
							</li>
						</ul>
					</li> -->
					<!--------->
		
				</ul>
		
			</div>
		
		
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
				<ul class="list-inline links-list pull-right">
		
					<!-- Language Selector -->
					<!-- <li class="dropdown language-selector">
		
						Language: &nbsp;
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
							<img src="assets/images/flags/flag-uk.png" width="16" height="16" />
						</a>
		
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#">
									<img src="assets/images/flags/flag-de.png" width="16" height="16" />
									<span>Deutsch</span>
								</a>
							</li>
							<li class="active">
								<a href="#">
									<img src="assets/images/flags/flag-uk.png" width="16" height="16" />
									<span>English</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="assets/images/flags/flag-fr.png" width="16" height="16" />
									<span>François</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="assets/images/flags/flag-al.png" width="16" height="16" />
									<span>Shqip</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="assets/images/flags/flag-es.png" width="16" height="16" />
									<span>Español</span>
								</a>
							</li>
						</ul>
		
					</li> -->
		
					<li class="sep"></li>
		
					
					<!-- <li>
						<a href="#" data-toggle="chat" data-collapse-sidebar="1">
							<i class="entypo-chat"></i>
							Chat
		
							<span class="badge badge-success chat-notifications-badge is-hidden">0</span>
						</a>
					</li> -->
		
					<!-- <li class="sep"></li> -->
		
					<li>
						<a href="index.php?logout=true">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
		
			</div>
		
		</div>

		<!-- <script type="text/javascript">
		$(document).ready(function(){
			var user_id="<?php //echo $user_id; ?>";

			$(document).on('click', '.dropdown-toggle', function(){
				
				$.ajax({
					url: "ajax.php",
					method: "post",
					data:{update_notification:user_id},
					success:function(data){
						console.log(data);

					}
				});

			});
		})
	</script> -->