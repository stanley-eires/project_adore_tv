<div class="content row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<h4 class="header-title">Package List</h4>
				<div class="table-responsive">
					<table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
						<thead class='text-primary'>
							<tr>
								<th>#</th>
								<th>Package Name</th>
								<th>Available Screen</th>
								<th>Price</th>
								<th>Status</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$counter = 1;
								foreach ($plans as $row):
								?>
							<tr>
								<td><?= $counter++;?></td>
								<td class='text-uppercase'><?= $row['name'];?></td>
								<td><?= $row['screens'];?></td>
								<td class='text-uppercase'> <?= currency($row['price']);?></td>
								<td class='text-uppercase'>
									<?= $row['status'] == 1?'active':'inactive'?>
								</td>
								<td>
									<a href="<?= base_url();?>admin/plan_edit/<?= $row['plan_id'];?>" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#edit<?= $row['plan_id'];?>" data-backdrop='static' class="btn btn-outline-info">
									<i class="mdi mdi-pencil"></i></a>
								</td>
							</tr>
							<div class="modal fade" id="edit<?= $row['plan_id'];?>" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit Plan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<form method="post" action="<?= base_url();?>admin/plan_edit/<?= $row['plan_id'];?>">
												<!--PACKAGE NAME -->
												<div class="form-group mb-3">
													<label for="name">Package Name</label>
													<input type="text" class="form-control" id = "name" name="name" value="<?= $row['name'];?>" required>
												</div>

												<!--PACKAGE PRICE -->
												<div class="form-group mb-3">
													<label for="price">Package Price</label>
													<input type="text" class="form-control" id = "price" name="price" value="<?= $row['price'];?>" required>
												</div>

												<!-- PACKAGE STATUS -->
												<div class="form-group mb-3">
													<label for="price">Status</label>
													<span class="help">Inactive packages won't show to customer during purchase.</span>
													<select class="form-control select2" name="status">
														<option value="0" <?= $row['status'] == 0?'selected':'';?>>Inactive</option>
														<option value="1" <?= $row['status'] == 1?'selected':'';?>>Active</option>
													</select>
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
</div>
