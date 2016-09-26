@extends('layout.Backend')

@section('css')
	<link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/asset/bootstrap/css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/dist/css/AdminLTE.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/dist/css/skins/_all-skins.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/bootstrapValidator/css/bootstrapValidator.min.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/asset/sweetalert/sweetalert.css">
  	<link rel="stylesheet" href="<?php echo url('/'); ?>/css/dropzone.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/asset/plugins/datatables/dataTables.bootstrap.css"/>
@endsection

@section('main_content')
	<section class="content-header">
		<h1>Media<small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL::to('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Media</li>
		</ol>
  	</section>
  	<section class="content">
  		<div class="box box-primary">
  			<div class="box-header">
  				<h2 class="pull-left">Upload file or image</h2>
  			</div>
  			<div class="box-body">  							
				<div class="nav-tabs-custom">
            		<ul class="nav nav-tabs">
              			<li class="active">
              				<a href="#tab_1-1" data-toggle="tab" aria-expanded="true">Upload Image</a>
          				</li>
              			<li class="">
              				<a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Image List</a>
          				</li>              			            
            		</ul>
	            	<div class="tab-content">
	              		<div class="tab-pane active" id="tab_1-1">
	                		{!! Form::open(['action' => 'MediaController@store', 'class' => 'dropzone', 'id' => 'my-dropzone', 'enctype' => 'multipart/form-data']) !!}
	  						{!! Form::close() !!}
	              		</div>
		              	<div class="tab-pane" id="tab_2-2">
		              		<button type="button" class="btn btn-sm btn-default pull-right" id="imgRefresh">
		              			<i class="fa fa-refresh" aria-hidden="true"></i> Refresh
	              			</button>
	              			<div class="clearfix"></div>							
							<table id="imageTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td>Image</td>
										<td>Name</td>
										<td>File</td>
										<td>Action</td>
									</tr>
								</thead>								
							</table>
		              	</div>
	            	</div>
          		</div>
  			</div> 
  			<div class="overlay" style="display:none;"><i class="fa fa-refresh fa-spin"></i></div> 				
  		</div>  		
  	</section>
@endsection

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
	<script src="<?php echo url('/'); ?>/asset/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/dropzone/dropzone.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/scripts/media.js"></script>
@endsection