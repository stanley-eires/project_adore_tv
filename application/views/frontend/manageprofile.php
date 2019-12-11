<style>
*{transition:500ms;}
img:hover{transform:scale(1.1);opacity:0.7}
</style>

<?php include 'header_browse.php';?>
<!-- TOP LANDING SECTION -->
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class='content container mt-md-5'>
		<div class='row text-center'>
			<div class='col-12 text-left'>
				<h1 class='display-4'><?= ('Manage Profiles');?></h1>	
			</div>
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/editprofile/user1');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb1.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user1');?></h3>
				</a>	
			</div>
			<?php if ($current_plan_id == 2 || $current_plan_id == 3):?>
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/editprofile/user2');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb2.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user2');?></h3>
				</a>	
			</div>
			<?php endif;?>
			<?php if ($current_plan_id == 3):?>	
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/editprofile/user3');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb3.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user3');?></h3>
				</a>	
			</div>
			<div class="col-6 col-md-3">
				<a href="<?= base_url('browse/editprofile/user4');?>" class="profile_switcher text-decoration-none" >
					<img class='img-thumbnail' style='width:150px;height:150px' src="<?= base_url('/assets/global/thumb4.png');?>" >
					<h3 class=' text-uppercase text-white'><?= $this->user_model->get_current_user_detail('user4');?></h3>
				</a>	
			</div>

			<?php endif;?>
			<div class="col-12">
				<div class="col-12 col-md-4 mx-auto my-5">
					<a href="<?= base_url('browse/youraccount') ?>" class="btn btn-light btn-orange btn-block btn-lg">
					<?= ('DONE');?></a>
				</div>
			</div>
			

			
		</div>
	</div>
</div>
<?php include 'footer.php';?>