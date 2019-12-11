<?php include 'header_browse.php';?>
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="content container mt-5 text-left">
		<div class="row">
			<div class="col-md-12">
				<h3 class="display-4">Change Email</h3>
				<hr>
			</div>
			<div class="col-md-5 text-left">
				<p><span class='font-weight-bold'>Current Email:</span> <span class='text-orange'><?= $this->user_model->get_current_user_detail('email')?></span></p>
				<form method="post" action="<?= base_url('browse/emailchange');?>">
					<div class="form-group no-border input-lg ">
						<label for='new_email'><?= ('New Email');?> </label>
						<input type="email" name="new_email" id="new_email" class='form-control p-3 '/>
					</div>
					
					<div class="form-group no-border">
						<label for='old_password'><?= ('Current Password');?></label>
						<input type="password" name="old_password" id="old_password" class='form-control p-3' />
					</div>
					
					<button class="btn btn-orange" type="submit"> <?= ('Save');?> </button>
					<a href="<?= base_url('browse/youraccount') ?>" class="btn btn-outline-secondary"><?= ('Cancel');?></a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>



