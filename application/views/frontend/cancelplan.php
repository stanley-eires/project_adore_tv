<?php include 'header_browse.php';?>
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="content container mt-5 text-left">
		<div class="row">
			<div class="col-md-12">
			<h3 class="display-4"><?= ('Cancel Membership');?>?</h3>
				<hr>
			</div>
			<div class="col-md-8">
				<h4 class="card-title"><?= ('Click the Finish Cancellation button below to cancel your membership');?></h4>
				<ul class=>
					<li>
						<?= ('Cancellation will be effective immedietly after your confirmation');?>
					</li>
					<li> 
						<?= ('Restart your membership anytime. Your viewing preferences will_be saved always');?>
					</li>
				</ul>
				<form method="post" action="<?= base_url('browse/cancelplan');?>">
					<input type="hidden" name="task" value="<?= ('cancel_plan');?>" />
					<button class="btn btn-orange" type="submit"> <?= ('Finish Cancellation');?> </button>
					<a href="<?= base_url('browse/youraccount') ?>" class="btn btn-outline-secondary"><?= ('Go Back');?></a>
				</form>
			</div>
		</div>
		<hr>
	</div>
</div>
<?php include 'footer.php';?>



