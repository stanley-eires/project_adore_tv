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
	<link href="<?= base_url('assets/css/now-ui-dashboard.css');?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/now-ui-kit.min98f3.css');?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/sweetalert.css');?>" rel="stylesheet" />
	<!--<link href="<?= base_url('assets/css/all.css');?>" rel="stylesheet" />-->
	<link href="<?= base_url('assets/css/carouselslide.css');?>" rel="stylesheet" />
	 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
	<link href="<?= base_url('assets/css/toastr.css');?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/animate.css');?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/core/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/js/core/popper.min.js');?>"></script>
	<script src="<?= base_url('assets/js/core/bootstrap.min.js');?>"></script>
	<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/js/sweetalert.min.js');?>"></script>
	<script src="<?= base_url('assets/js/toastr.min.js');?>"></script>
	<script src="<?= base_url('assets/js/now-ui-kit.min98f3.js');?>"></script>
	<script src="<?= base_url('assets/js/customjs.js');?>"></script>
    <style>
		.btn-orange{background-color:#ff5d00;color:white;}
		.text-orange{color:#ff5d00}
	</style>
</head>
	
<body class='bg-dark text-white-50'>
<?php if($this->session->flashdata('notification')){echo $this->session->flashdata('notification');}?>
<?php 
	$VALID_SUBSCRIPTION = $this->subscription_model->validate_subscription();
?>
	<?php include ($page_name . '.php');?>
	<script src="<?= base_url('assets/js/slick.min.js');?>"></script>
	<script>
		$('.default-slick-carousel').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			autoplay:true,
			arrows: false,
			adaptiveHeight: true,
			centerMode: true,
			centerPadding:"150px",
			//mobileFirst: true,
			responsive: [
				{
				breakpoint: 1292,
				settings: {
					dots: false,
					arrows: false,
					
				}
				},
				{
				breakpoint: 993,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: false,
					arrows: false,
					centerMode: false,
				}
				},
				{
				breakpoint: 769,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: false,
					arrows: false,
					centerMode: false,
				}
				}
			]
		});
	</script>
</body>
</html>
