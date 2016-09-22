<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta id="token" name="token" content="{{ csrf_token() }}"">
  	<title>AdminLTE 2 | Dashboard</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	@yield('css')	
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
  		<header class="main-header">
		    <a href="index2.html" class="logo">
		      <span class="logo-lg"><b>Administrator</b></span>
		    </a>   
		    <nav class="navbar navbar-static-top">
		    	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		    		<span class="sr-only">Toggle navigation</span>
		      	</a>
      			<div class="navbar-custom-menu">
        			<ul class="nav navbar-nav">
          				<li class="dropdown messages-menu">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				            	<i class="fa fa-envelope-o"></i>
				            	<span class="label label-success">4</span>
				            </a>
            				<ul class="dropdown-menu">
              					<li class="header">You have 4 messages</li>
              					<li>                
                					<ul class="menu">
										<li>
											<a href="#">
												<div class="pull-left">
										    		<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
										  		</div>
										  		<h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4>
										  		<p>Why not buy a new awesome theme?</p>
											</a>
										</li>
					                    <li>
					                    	<a href="#">
					                    		<div class="pull-left">
					                        		<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
					                      		</div>
					                    		<h4>AdminLTE Design Team<small><i class="fa fa-clock-o"></i> 2 hours</small></h4>
					                    		<p>Why not buy a new awesome theme?</p>
					                    	</a>
					                    </li>
					                    <li>
					                    	<a href="#">
					                      		<div class="pull-left">
					                        		<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
					                      		</div>
					                      		<h4>Developers<small><i class="fa fa-clock-o"></i> Today</small></h4>
					                      		<p>Why not buy a new awesome theme?</p>
					                   		 </a>
					                  	</li>
					                    <li>
						                    <a href="#">
						                    	<div class="pull-left">
						                        	<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
						                      	</div>
						                      	<h4>Sales Department<small><i class="fa fa-clock-o"></i> Yesterday</small></h4>
						                      	<p>Why not buy a new awesome theme?</p>
						                    </a>
						                </li>
					                  	<li>
					                    	<a href="#">
					                      		<div class="pull-left">
					                        		<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
					                      		</div>
					                      		<h4>Reviewers<small><i class="fa fa-clock-o"></i> 2 days</small></h4>
					                      		<p>Why not buy a new awesome theme?</p>
				                    		</a>
					                  	</li>
                					</ul>
              					</li>
              					<li class="footer"><a href="#">See All Messages</a></li>
            				</ul>
          				</li>
          				<li class="dropdown notifications-menu">
            				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              					<i class="fa fa-bell-o"></i><span class="label label-warning">10</span>
            				</a>
            				<ul class="dropdown-menu">
              					<li class="header">You have 10 notifications</li>
              					<li>
                					<ul class="menu">
					                	<li>
					                    	<a href="#">
					                      		<i class="fa fa-users text-aqua"></i> 5 new members joined today
					                    	</a>					                    	
					                  	</li>
					                  	<li>
					                    	<a href="#">
					                      		<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
					                    	</a>
					                  	</li>
					                  	<li>
					                    	<a href="#">
					                      		<i class="fa fa-users text-red"></i> 5 new members joined
				                    		</a>
					                  	</li>
					                  	<li>
					                    	<a href="#">
					                      		<i class="fa fa-shopping-cart text-green"></i> 25 sales made
				                    		</a>
					                  	</li>
					                  	<li>
					                    	<a href="#">
					                      		<i class="fa fa-user text-red"></i> You changed your username
					                    	</a>
					                  	</li>
                					</ul>
              					</li>
              					<li class="footer"><a href="#">View all</a></li>
            				</ul>
          				</li>
          				<li class="dropdown tasks-menu">
            				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              					<i class="fa fa-flag-o"></i><span class="label label-danger">9</span>
            				</a>
            				<ul class="dropdown-menu">
              					<li class="header">You have 9 tasks</li>
              					<li>                
                					<ul class="menu">
					                	<li>
					                    	<a href="#">
					                      		<h3>Design some buttons<small class="pull-right">20%</small></h3>
					                      		<div class="progress xs">
					                        		<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					                          			<span class="sr-only">20% Complete</span>
					                        		</div>
					                      		</div>
					                   		 </a>
					                  	</li>
					                  	<li>
					                    	<a href="#">
					                      		<h3>Create a nice theme<small class="pull-right">40%</small></h3>
					                      		<div class="progress xs">
					                        		<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					                          			<span class="sr-only">40% Complete</span>
					                        		</div>
					                      		</div>
					                    	</a>
					                  	</li>                  
					                  	<li>
					                    	<a href="#">
					                      		<h3>Some task I need to do<small class="pull-right">60%</small></h3>
					                      		<div class="progress xs">
					                        		<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					                          			<span class="sr-only">60% Complete</span>
					                        		</div>
					                      		</div>
					                    	</a>
					                  	</li>                  
					                  	<li>
					                    	<a href="#">
					                      		<h3>Make beautiful transitions<small class="pull-right">80%</small></h3>
					                      		<div class="progress xs">
					                        		<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
					                          			<span class="sr-only">80% Complete</span>
					                        		</div>
					                      		</div>
					                    	</a>
					                  	</li>                  
                					</ul>
              					</li>
				              	<li class="footer">
				                	<a href="#">View all tasks</a>
				              	</li>
            				</ul>
          				</li>
          				<li class="dropdown user user-menu">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown">				              
				              <span class="hidden-xs">{{ Auth::user()->username }}</span>
				            </a>
          				</li>
			          	<li>
			          		<a href="{{ url('/logout') }}" 
			          			onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			          			<i class="fa fa-sign-out" aria-hidden="true"></i> Logout
		          			</a>
		          			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
		          		</li>
        			</ul>
      			</div>
    		</nav>
  		</header>
  		<aside class="main-sidebar">
		    <section class="sidebar">
		      	<ul class="sidebar-menu">
		        	<li class="header">MAIN NAVIGATION</li>
		        	<li class="treeview">
		        		<a href="<?= URL::to('admin') ?>">
		        			<i class="fa fa-dashboard"></i><span>Dashboard</span>
	        			</a>
        			</li>
			        <li class="treeview">
			        	<a href="<?= URL::to('admin/post') ?>">
			        		<i class="fa fa-sticky-note-o" aria-hidden="true"></i><span>Posts</span>
			        	</a>
		        	</li>
			        <li class="treeview">
			        	<a href="<?= URL::to('admin/page') ?>">
			        		<i class="fa fa-files-o"></i><span>Pages</span>
		        		</a>
	        		</li>
			        <li class="treeview">
			        	<a href="<?= URL::to('admin/category') ?>">
			        		<i class="fa fa-tags" aria-hidden="true"></i><span>Categories</span>
		        		</a>
	        		</li>
			        <li class="treeview">
			        	<a href="<?= URL::to('admin/menu') ?>">
			        		<i class="fa fa-bars" aria-hidden="true"></i></i><span>Menus</span>
		        		</a>
	        		</li>
			        <li class="treeview">
			        	<a href="<?= URL::to('admin/media') ?>">
			        		<i class="fa fa-file-image-o" aria-hidden="true"></i><span>Media</span>
		        		</a>
	        		</li>
			        <li class="treeview">
			        	<a href="<?= URL::to('admin/slide') ?>">
			        		<i class="fa fa-sliders" aria-hidden="true"></i><span>Slides</span>
		        		</a>
	        		</li>
					<li class="treeview">
						<a href="<?= URL::to('user') ?>">
							<i class="fa fa-users" aria-hidden="true"></i><span>Users</span>
						</a>						
					</li>
      			</ul>
    		</section>
  		</aside>
  		<div class="content-wrapper">

  			@yield('main_content')
  			    		
  		</div>
	  	<footer class="main-footer">
	    	<div class="pull-right hidden-xs"><b>Version</b> 2.3.6</div>
	    	<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> 
	    	All rights reserved.
	  	</footer>
  		<div class="control-sidebar-bg"></div>
	</div>

	@yield('script')

</body>
</html>