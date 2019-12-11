<style>
*{transition:500ms;}
img:hover{transform:scale(1.1);opacity:0.7}
</style>

<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	<div class="container">
		<div class="navbar-wrapper">
			<a class="navbar-brand" href="<?= base_url();?>" ><img src="<?= base_url('assets/img/NEW2.png');?>" alt="adoreTv.png" style="width:70px"></a>
		</div>
	</div>
</nav>


<!-- TOP LANDING SECTION -->
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class='container bg-transparent '>
		<div class='row text-center '>
			<div class="col-12 my-3">
				<h1 class='text-white display-4'><?= ('Who Is Watching');?>?</h1>
			</div>
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/doswitch/user1');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb1.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user1');?></h3>
				</a>	
			</div>
			<?php if ($current_plan_id == 2 || $current_plan_id == 3):?>
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/doswitch/user2');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb2.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user2');?></h3>
				</a>	
			</div>
			<?php endif;?>
			<?php if ($current_plan_id == 3):?>	
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/doswitch/user3');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb3.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user3');?></h3>
				</a>	
			</div>
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/doswitch/user4');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb4.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user4');?></h3>
				</a>	
			</div>

			<?php endif;?>
			<div class="col-12 my-3">
				<a href="<?= base_url('browse/manageprofile');?>" class="btn btn-dark btn-orange btn-lg">
				<?= ('MANAGE PROFILES');?></a>
			</div>
			

			
		</div>
	</div>
</div>
<?php include 'footer.php';?> 