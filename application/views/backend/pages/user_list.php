<div class="content row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
				<div class="table-responsive">					
					<table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
						<thead class='text-primary'>
							<tr>
								<th>
									#
								</th>
								<th>User Name</th>
								<th>User Email</th>
								<th>Package</th>
								<th>Operations</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$counter = 1;
								foreach ($users as $row):
								?>
							<tr>
								<td><?= $counter++;?></td>
								<td class='text-capitalized'><?= $row->name;?> <?= $row->type == 1?'<span class="badge badge-primary bg-primary">Admin</span>':''?></td>
								<td class='text-lowercase small'><?= $row->email;?></td>
								<td class='text-uppercase'>
									<?php
										$plan_id	=	$this->subscription_model->get_active_plan_of_user($row->user_id);
										if ($plan_id != false){
											$plan_name	=	$this->subscription_model->get_plan_detail($plan_id,'name');
											echo "<span class='text-success small'>$plan_name Plan</span>";
										}else{
											echo "<span class='text-danger small'>No current subscription</span>";
										}
									?>
								</td>
								<td>
									<div class="btn-group btn-group-sm">
										<a class="btn btn-outline-info" data-toggle="modal" data-target="#edit<?= $row->user_id;?>" data-backdrop='static'>
										<i class="mdi mdi-pencil"></i></a>
										<?php if ($row->status == 1):?>
											<a href="<?= base_url();?>admin/user_operation/<?= $row->user_id;?>/ban" class="btn btn-outline-danger" onclick="return confirm('Sure you want to ban user?')" data-toggle="tooltip"  title="Ban User">
											<i class="fa fa-ban"></i></a>
										<?php else :?>
											<a href="<?= base_url();?>admin/user_operation/<?= $row->user_id;?>/unban" class="btn btn-outline-primary" onclick="return confirm('Sure you want to un-ban user?')" data-toggle="tooltip"  title="Un-ban User">
											<i class="fa fa-check"></i></a>
										<?php endif?>
									</div>
									
								</td>
							</tr>
							<!-- Modal -->
							<div class="modal fade" id="edit<?= $row->user_id;?>" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit User</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<form method="post" action="<?= base_url();?>admin/user_edit/<?= $row->user_id;?>">
												<div class="form-group mb-3">
													<label for="name">User's Name</label>
													<input type="text" class="form-control" id = "name" name="name" value="<?= $row->name;?>" required>
												</div>

												<div class="form-group mb-3">
													<label for="email">User's Email</label>
													<input type="email" class="form-control" id = "email" name="email" value="<?= $row->email;?>" required>
												</div>
												<div class="form-group float-right">
													<input type="submit" class="btn btn-light btn-orange" value="Update">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
            </div>
        </div>
	</div>
	<div class="col-md-3">
		<div class="card">
            <div class="card-body">
				<h4 class="card-title">Create Admin User</h4>
				<form method="post" action="<?= base_url();?>admin/user_create">
					<div class="form-group mb-3">
						<label for="name">User's Name</label>
						<input type="text" class="form-control" id = "name" name="name" required>
					</div>

					<div class="form-group mb-3">
						<label for="email">User's Email</label>
						<input type="email" class="form-control" id = "email" name="email" required>
					</div>
					<div class="form-group mb-3">
						<label for="password">User's Password</label>
						<input type="password" class="form-control" id = "password" name="password" required>
					</div>
					<div class="form-group float-right">
						<input type="submit" class="btn btn-light btn-orange" value="Create">
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
