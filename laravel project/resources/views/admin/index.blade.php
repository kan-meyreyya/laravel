@extends('layout.backend')

@section('css')
	<link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/asset/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/asset/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/asset/dist/css/skins/_all-skins.min.css">
@stop

@section('main_content')

  <section class="content-header">
      <h1>Dashboard<small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="<?= URL::to('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
          </div>
          <div class="icon"><i class="ion ion-bag"></i></div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>Bounce Rate</p>
          </div>
          <div class="icon"><i class="ion ion-stats-bars"></i></div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>
            <p>User Registrations</p>
          </div>
          <div class="icon"><i class="ion ion-person-add"></i></div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>
            <p>Unique Visitors</p>
          </div>
          <div class="icon"><i class="ion ion-pie-graph"></i></div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
@stop