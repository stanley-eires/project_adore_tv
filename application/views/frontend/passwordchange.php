<?php include 'header_browse.php';?>
<div class="page-header header-filter" filter-color="orange" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="content container mt-5 text-left">
		<div class="row">
			<div class="col-md-12">
				<h3 class="display-4"><?= ('Change Password');?></h3>
				<hr>
			</div>
			<div class="col-md-5">
				<form method="post" action="<?= base_url('browse/passwordchange');?>">
					<div class="form-group no-border">
						<label for='old_password'><?= ('Current Password');?></label>
						<input type="password" name="old_password" id="old_password" class='form-control p-3' required minlength="6"/>
					</div>
					<div class="form-group no-border">
						<label for='new_password'><?= ('New Password');?></label>
						<input type="password" name="new_password" id="new_password" class='form-control p-3' required minlength="6"/>
					</div>
					<br>
					<button class="btn btn-orange" type="submit"> <?= ('Save');?> </button>
					<a href="<?= base_url('browse/youraccount') ?>" class="btn btn-outline-secondary"><?= ('Cancel');?></a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>