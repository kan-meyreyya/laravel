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
  				{!! Form::open(['action' => 'MediaController@store', 'class' => 'dropzone', 'id' => 'my-dropzone', 'enctype' => 'multipart/form-data']) !!}
  				{!! Form::close() !!}  			
  			</div>  				
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
	<script src="<?php echo url('/'); ?>/asset/scripts/user.js"></script>
	<script src="<?php echo url('/'); ?>/asset/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/dropzone/dropzone.min.js"></script>
	<script src="<?php echo url('/'); ?>/asset/scripts/media.js"></script>
@endsection