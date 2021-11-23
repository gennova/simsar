<!DOCTYPE html>
<html lang="en">
	<head>
		  <title><?=isset($title)?$title:'SIMSAR v.2' ?></title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <meta name = "keywords" content = "SIM SARPRA YPII" />
      	  <meta name = "description" content = "Simsar V.2" />
      	  <meta name = "author" content = "itypii" />
		  <!-- Bootstrap 3.3.6 -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
		  <!-- Datatable style -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
		  <!-- Custom CSS -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">		
		  <!-- AdminLTE Skins. Choose a skin from the css/skins
			   folder instead of downloading all of them to reduce the load. -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/skins/skin-red.min.css">
		  <!-- jQuery 2.2.3 -->
		  <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
		
	</head>
	<body class="hold-transition skin-red sidebar-mini">
		<div class="wrapper" style="height: auto;">
			<?php if($this->session->flashdata('msg') != ''): ?>
			    <div class="alert alert-warning flash-msg alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			      <h4>Success!</h4>
			      <?= $this->session->flashdata('msg'); ?> 
			    </div>
			<?php endif; ?>

			<section id="container">
				<!--header start-->
				<header class="header white-bg">
					<?php include(APPPATH.'views/include/navbar.php'); ?>
				</header>
				<!--header end-->
				<!--sidebar start-->
				<aside>
					<?php if($this->session->userdata('is_admin_login')): ?>
						<?php include(APPPATH.'views/include/admin_sidebar.php'); ?>
					<?php else: ?>
						<?php include(APPPATH.'views/include/sidebar.php'); ?>
					<?php endif; ?>
				</aside>
				<!--sidebar end-->
				
				<!--main content start-->
				<section id="main-content">
					<div class="content-wrapper" style="min-height: 394px; padding:15px;">
						<!-- page start-->
							
							  
 <section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-list"></i> &nbsp; Data Barang Kategori ALAT LABORATORIUM</h4>
				</div>  
			</div>
		</div>
	</div>

   <div class="box">
    <!-- /.box-header -->
    <div class="box-body table-responsive">
		<?php 
			foreach($css_files as $file): ?>
				<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>	
					
		<?php echo $output; ?>
    </div>
			<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
    </div>	
    <!-- /.box-body -->
  <!-- /.box -->
</section>
  

					
						<!-- page end-->
					</div>
				</section>
				<!--main content end-->
				<!--footer start-->
				<footer class="main-footer">
					<strong>Copyright © 2020 <a href="http://www.ypiibandung.or.id">IT YPII Bandung</a></strong> All rights
					reserved.
				</footer>
				<!--footer end-->
			</section>

			<!-- /.control-sidebar -->
			<?php include(APPPATH.'views/include/control_sidebar.php'); ?>
		</div>
		
    
	<!-- Bootstrap 3.3.6 -->
	<script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>public/dist/js/app.min.js"></script>

	<script type="text/javascript">
	  $(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
	    $(".flash-msg").slideUp(500);
	});
	</script>

	</body>
</html>