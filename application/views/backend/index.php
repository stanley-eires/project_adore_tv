<!doctype html>
<html>
	<head>
		<title><?= $page_title;?> | <?= $this->db->get_where('settings',array('type'=>'site_name'))->row()->description;?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png');?>">
		<link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png');?>">
		<link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/now-ui-dashboard.css?v=1.3.0');?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/demo.css');?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/icons.min.css'); ?>" rel="stylesheet"/>
		<link href="<?= base_url('assets/css/sweetalert.css');?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/all.css');?>" rel="stylesheet" />
		<link href="<?= base_url('assets/css/toastr.css');?>" rel="stylesheet" />

		<link href="<?= base_url('assets/css/dataTables.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/responsive.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/buttons.bootstrap4.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/select.bootstrap4.css');?>" rel="stylesheet" type="text/css" />

		<script src="<?= base_url('assets/js/core/jquery.min.js');?>"></script>
		<script src="<?= base_url('assets/js/core/popper.min.js');?>"></script>
		<script src="<?= base_url('assets/js/core/bootstrap.min.js');?>"></script>
		<script src="<?= base_url('assets/js/sweetalert.min.js');?>"></script>
		<script src="<?= base_url('assets/js/toastr.min.js');?>"></script>
		<script src="<?= base_url('assets/js/customjs.js');?>"></script>
		
		<style>
			.btn-orange{background-color:#ff5d00;color:white;}
			.text-orange{color:#ff5d00}
		</style>
	</head>

	<body>
		<?php if($this->session->flashdata('notification')){echo $this->session->flashdata('notification');}?>
		<div class="wrapper ">
			<!-- SIDEBAR -->
			<div class="sidebar" data-color="orange">
				<?php include 'menu.php'; ?>
			</div>
			<div class="main-panel" id="main-panel">
				<!-- NAVBAR -->
				<?php include 'header.php'; ?>

				<div class="panel-header panel-header-sm">
				</div>

				<!--PAGE CONTENT -->
				<?php include 'pages/'.$page_name.'.php';?>
				  
				<!-- FOOTER -->
			</div>
		</div>
		<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
		<script src="<?= base_url('assets/js/now-ui-dashboard.js?v=1.3.0');?>"></script>
		<script src="<?= base_url('assets/js/demo.js');?>"></script>

		<script src="<?= base_url('assets/js/jquery.dataTables.js'); ?>"></script>
		<script src="<?= base_url('assets/js/dataTables.bootstrap4.js'); ?>"></script>
		<script src="<?= base_url('assets/js/dataTables.buttons.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/buttons.bootstrap4.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/demo.datatable-init.js'); ?>"></script>

		<script>
			$(function(){
				$('[data-toggle="tooltip"]').tooltip()
			})
		</script>
	</body>
</html>