
<?php include 'header_browse.php';?>
<!-- TOP LANDING SECTION -->
	<?php
	if ($user == 'user1'){
		$username 	=	$this->user_model->get_current_user_detail('user1');
		$thumb	=	'thumb1.png';
	}
	else if ($user == 'user2'){
		$username 	=	$this->user_model->get_current_user_detail('user2');
		$thumb	=	'thumb2.png';
	}
	else if ($user == 'user3'){
		$username 	=	$this->user_model->get_current_user_detail('user3');
		$thumb	=	'thumb3.png';
	}
	else if ($user == 'user4'){
		$username 	=	$this->user_model->get_current_user_detail('user4');
		$thumb	=	'thumb4.png';
	}
	?>
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	
	<div class="content container mt-md-5 text-left">
		<div class="row ">
			<div class='col-md-12'>
				<h1 class='display-4'><?= ('Edit Profile');?></h1>
			</div>
			<div class="col-md-6">
				<form method="post" id="form" 
				action="<?= base_url('browse/editprofile/');?><?= $user;?>">
					<div class="row no-gutters">
						<div class="col-md-5">
							<img src="<?= base_url('assets/global/');?><?= $thumb;?>" style="height: 160px;" class='img-fluid img-thumbnail' />
						</div>
						<div class="col-md-7 mt-3">
							<div class="input-group no-border input-lg ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white"><i class="now-ui-icons users_circle-08"></i></span>
                                </div>
                                <input type="text" placeholder="Name" value="<?= $username;?>" name="username" class='form-control'/>
                            </div>
							
								<button type='submit' class="btn btn-orange btn-sm"><?= ('SAVE');?></button>
								<a href="<?= base_url('browse/manageprofile');?>" class="btn btn-outline-secondary btn-sm"><?= ('CANCEL');?></a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
