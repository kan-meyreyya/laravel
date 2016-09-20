@extends('Layout.Backend')

@section('css')
	<link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/asset/bootstrap/css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/dist/css/AdminLTE.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/dist/css/skins/_all-skins.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/bootstrapValidator/css/bootstrapValidator.min.css">
@stop

@section('main_content')
	<section class="content-header">
		<h1>User<small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::to('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">User</li>
		</ol>
  	</section>
  	<section class="content">
  		<div class="box box-primary">
  			<div class="box-header">
  				<button type="button" data-toggle="modal" data-target="#myModal"" class="btn btn-default pull-left">
  					<i class="fa fa-plus"></i> Add User
				</button>
  			</div>
  			<div class="box-body">
  				<table class="table table-hover">
					<thead>
						<tr>
							<th>UserName</th>
							<th>Email</th>
							<th>Role</th>
							<th>Create Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($users as $user){
								echo '<tr>
										<td>'. $user->username .'</td>
										<td>'. $user->email .'</td>
										<td>'. $user->role .'</td>
										<td>'. $user->create_date .'</td>
										<td>
											<button type="button" class="btn btn-sm btn-danger">Edit</button>
											<button type="button" class="btn btn-sm btn-primary">Delete</button>
										</td>
									  </tr>';
							}
						?>
					</tbody>
				</table>

  				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        			<span aria-hidden="true">&times;</span>
			        			</button>
				        		<h4 class="modal-title" id="myModalLabel">Create New User</h4>
				      		</div>
				      		<div class="modal-body">
				      			{!! Form::open(['action' => 'UserController@store', 'class' => 'form-horizontal mainForm', 'autocomplet' => 'false', 'onsubmit' => 'return false']) !!}
				      				<div class="form-group">
								    	{!! Form::label('username','User Name',['class' => 'col-sm-3 control-label']) !!}
								    	<div class="col-sm-9">
								      		{!! Form::text('username','',['class' => 'form-control', 'placeholder' => 'User Name']) !!}
								    	</div>
								  	</div>
								  	<div class="form-group">
								    	{!! Form::label('email','E-mail',['class' => 'col-sm-3 control-label']) !!}
								    	<div class="col-sm-9">
								      		{!! Form::email('email','',['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}
								    	</div>
								  	</div>								  	
								  	<div class="form-group">
								    	{!! Form::label('password','password',['class' => 'col-sm-3 control-label']) !!}
								    	<div class="col-sm-9">
								      		{!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) !!}
								    	</div>
								  	</div>
								  	<div class="form-group">
								    	{!! Form::label('comfirm_password','Confirm Pwd',['class' => 'col-sm-3 control-label']) !!}
								    	<div class="col-sm-9">
								      		{!! Form::password('comfirm_password',['class' => 'form-control', 'placeholder' => 'Comfirm Password']) !!}
								    	</div>
								  	</div>
								  	<div class="form-group">
								    	{!! Form::label('user_role','role',['class' => 'col-sm-3 control-label']) !!}
								    	<div class="col-sm-9">
								      		{!! 
								      			Form::select('role', 
								      				[
									      				'administrator' => 'Adminstrator', 
									      				'editor' => 'Editor',
									      				'author' => 'Author'
								      				], 
								      				null, 
								      				['class' => 'form-control']
							      				) 
							      			!!}
								    	</div>
								  	</div>
								  	<div class="modal-footer">
						        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        		{!! Form::submit('Save',['class' => 'btn btn-primary saveUser']) !!}
						      		</div>
				      			{!! Form::close() !!}
				      		</div>				      		
				    	</div>
				  	</div>
				</div>
  			</div>
  		</div>
  	</section>
@stop

@section('script')
	<script src="<?php echo url('/'); ?>/asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<script src="<?php echo url('/'); ?>/asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/dist/js/app.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/dist/js/pages/dashboard.js"></script>
	<script src="<?php echo url('/'); ?>/asset/dist/js/demo.js"></script>
	<script src="<?php echo url('/'); ?>/asset/bootstrapValidator/js/bootstrapValidator.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/scripts/user.js"></script>
@stop