<div class="content row">
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update profile</h4>
				<?php
					$user_id	=	$this->session->userdata('user_id');
					$user_detail = $this->db->get_where('user',array('user_id'=>$user_id))->row();
					?>
				<form method="post" action="<?= base_url();?>admin/account">
					<input type="hidden" name="task" value="update_profile" />
					<div class="form-group mb-3">
						<label for="simpleinput1">Your name</label>
						<input type="text" class="form-control" id = "simpleinput1" name="name" value="<?= $user_detail->name;?>" required>
					</div>
					<div class="form-group mb-3">
						<label for="simpleinput2">Your email</label>
						<input type="text" class="form-control" id = "simpleinput2" name="email" value="<?= $user_detail->email;?>" required>
					</div>

					<div class="form-group mb-3 float-right">
						<input type="submit" class="btn btn-light btn-orange" value="Update profile">
					</div>
				</form>
            </div>
        </div>
    </div>

	<div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Change password</h4>

				<?php
					$user_id	=	$this->session->userdata('user_id');
					$user_detail = $this->db->get_where('user',array('user_id'=>$user_id))->row();
					?>
				<form method="post" action="<?= base_url();?>admin/account" enctype="multipart/form-data">
					<input type="hidden" name="task" value="update_password" required />
					<div class="form-group mb-3">
	                    <label for="simpleinput3">New password</label>
	                    <input type="password" class="form-control" id = "simpleinput3" name="new_password" required>
	                </div>
					<div class="form-group mb-3">
	                    <label for="simpleinput4">Current password</label>
	                    <input type="password" class="form-control" id = "simpleinput4" name="old_password" required>
	                </div>
					<div class="form-group float-right">
						<input type="submit" class="btn btn-light btn-orange" value="Update password">
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
