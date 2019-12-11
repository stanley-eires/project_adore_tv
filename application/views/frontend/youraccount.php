
<?php include 'header_browse.php';?>
<div class="page-header header-filter" filter-color="" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/biggi1.jpg')?>);background-color:#ff5722;background-blend-mode:multiply">
	</div>
	<div class="container mt-5 content text-left">
		<div class="row">
			<div class="col-md-12">
				<h3 class="display-4">Account</h3>
				<hr>
			</div>
			<div class="col-md-12"> 
				<div class="row">
					<div class="col-md-4">
						<h3 class='font-weight-lighter'>MEMBERSHIP & BILLING</h3>
						<?php if ( $VALID_SUBSCRIPTION  == false):?>
							<a href="<?= base_url('browse/purchaseplan');?>" class="btn btn-primary"> Purchase Membership</a>
						<?php endif;?>
						<?php if ( $VALID_SUBSCRIPTION  != false):?>
							<a href="<?= base_url('browse/cancelplan');?>"  class="btn btn-danger"> Cancel Membership
							</a>
						<?php endif;?>
					</div>
					<div class="col-md-8 px-5 px-md-0">
						<div class="row d-flex justify-content-between mt-0 ">
							<span class='font-weight-bold'><?= $this->user_model->get_current_user_detail("email")?></span>
							<a href="<?= base_url('browse/emailchange');?>">Change Email</a>
						</div>
						<div class="row d-flex justify-content-between">
							<span class='font-weight-bold'>Password : ********</span>
							<a href="<?= base_url('browse/passwordchange');?>">Change Password</a>

						</div>
					</div>
				</div>
				<hr >
				<div class="row">
					<div class="col-md-4">
						<h3 class='font-weight-lighter'>PLAN DETAILS</h3>
					</div>
					<div class="col-md-8 px-5 px-md-0">
						<?php
							if ( $VALID_SUBSCRIPTION  != false):
								$current_plan_id = $this->subscription_model->get_current_plan_id();
								$current_plan_name = $this->subscription_model->get_plan_detail($current_plan_id,"name");
								$current_plan_screens =	$this->subscription_model->get_plan_detail($current_plan_id,"screens");
								$current_subscription_upto_timestamp = $this->db->get_where('subscription', array('plan_id'=> $current_plan_id))->row()->timestamp_to;
						?>
						<div class="row d-flex justify-content-between mt-0">
							<span class='font-weight-bold'><?= "$current_plan_name ($current_plan_screens screens)"; ?></span>
							<a href="<?= base_url('browse/cancelplan');?>" onclick='return false'>Cancel</a>
						</div>
						<div class="row d-flex justify-content-between">
							<span class='font-weight-bold'>Effective upto : <?= date('d M, Y', $current_subscription_upto_timestamp);?></span>
							<a href="<?= base_url('browse/billinghistory');?>">Billing History</a>
						</div>
						<div class="row">
							<em class='small'>for changing plan, cancel the currently running plan first</em>
						</div>
						<?php endif;?>
						<?php if ( $VALID_SUBSCRIPTION  == false):?>
						<div class="row d-flex justify-content-between">
							<em class='small'><?= ('Membership inactive');?></em>
							<a href="<?= base_url('browse/purchaseplan');?>">Purchase</a>
						</div>
						<?php endif;?>
					</div>
				</div>
				<hr >
				<div class="row">
					<div class="col-md-4">
						<h3 class='font-weight-lighter'>MY PROFILE</h3>
					</div>
					<div class="col-md-8 px-5 px-md-0">
						<?php if (isset($active_user)) :?>
						<div class="row d-flex justify-content-between mt-0">
							<div>
								<img src="<?= base_url('assets/global/'.$bar_thumb);?>" style="height: 40px;" class='img-thumbnail' />
								<?= $bar_text;?>
							</div>
							<a href="<?= base_url('browse/manageprofile');?>">Manage profiles</a>
							
						</div>
						<?php endif;?>
					</div>
				</div>
				<hr >
			</div>
		</div>
		<hr>
	</div>
</div>
<?php include 'footer.php';?>