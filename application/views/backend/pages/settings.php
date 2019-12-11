<div class="content">
	
		<div class=" row">
			<div class="col-md-8">
			    <div class="card">
			        <div class="card-body">
						<form method="post" action="<?= base_url();?>admin/settings">
						<div class="form-group mb-3">
							<label for="simpleinput1">Website Name</label>
							<input type="text" class="form-control" id = "simpleinput1" name="site_name" value="<?= $this->crud_model->get_settings('site_name')?>">
						</div>
						<div class="form-group mb-3">
							<label for="simpleinput2">Website Email</label>
							<input type="text" class="form-control" id = "simpleinput2" name="site_email" value="<?= $this->crud_model->get_settings('site_email')?>">
						</div>

						<div class="form-group mb-3">
							<label for="example-select">Trial Period Functionality</label>
							<select class="form-control" id="example-select" name="trial_period">
							<?php $trial_period = $this->crud_model->get_settings('trial_period')?>
								<option value="on" <?php if ($trial_period == 'on')echo 'selected';?>>On</option>
								<option value="off" <?php if ($trial_period == 'off')echo 'selected';?>>Off</option>
							</select>
						</div>

						<div class="form-group mb-3">
							<label for="simpleinput3">Trial Period Number of days</label>
							<input type="number" min="0" class="form-control" id = "simpleinput3" name="trial_period_days" value="<?= $this->crud_model->get_settings('trial_period_days')?>">
						</div>

						<div class="form-group mb-3">
							<label for="simpleinput8">Invoice address</label>
							<input type="text" id="simpleinput8" class="form-control" name="invoice_address" value="<?= $this->crud_model->get_settings('invoice_address')?>">
						</div>
						<div class="form-group clearfix">
							<input type="submit" class="btn btn-light btn-orange float-right" value="Update Website Settings">
						</div>
						</form>	
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-12 d-flex justify-content-between">
								<h6>Manage Pages</h6>
								<button type="button" name="" id="" class="btn btn-light btn-sm btn-orange" data-toggle="modal" data-target="#create_page" data-backdrop='static'>Add Page</button>
							</div>
							<div class="col-12">
								<table id="basic-datatable" class="table nowrap">
									<thead class=''>
										<tr>
											<th>#</th>
											<th>Page Name</th>
											<th>Operation</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$pages = $this->crud_model->get_pages();
											foreach ($pages as $page):?>
									
										<tr>
											<td><?=$i++?></td>
											<td>
												<?= $page->name?> <?= $page->status==1?'<span class="badge badge-info">Active</span>':'<span class="badge badge-warning">Inactive</span>'?>
												<?= $page->popup==1?'<i class="fa fa-clipboard"></i>':''?>
											</td>
											<td>
												<div class='btn-group btn-group-sm'>
													<a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#edit<?= $page->id ?>" data-backdrop='static'><i class="mdi mdi-pencil"></i>
													<a href="" class="btn btn-outline-danger" onclick=""><i class="mdi mdi-delete"></i>
													</a>
												</div>
											</td>
										</tr>
										<div class="modal fade" id="edit<?= $page->id ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Edit <?= $page->name?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
													</div>
													<div class="modal-body">
														<form method="post" action="<?= base_url();?>admin/edit_page/<?= $page->id ?>">
															<div class="form-group mb-3">
																<label for="name">Page Name</label>
																<input type="text" class="form-control" id = "name" name="name" value="<?= $page->name?>" required>
															</div>

															<div class="form-group mb-3">
																<label for="">Page Content</label>
																<textarea class="form-control form-control-lg"  name="content" rows='30'><?= $page->content?></textarea>
															</div>

															<div class="row">
																<div class="form-group mb-3 col-md-6">
																	<label for="">Status</label>
																	<select class="form-control" name="status">
																		<option value="1" <?= $page->status == 1?"selected":""?>>Active</option>
																		<option value="0" <?= $page->status == 0?"selected":""?>>Inactive</option>
																	</select>
																</div>
																<div class="form-group mb-3 col-md-6">
																	<label for="">Make Popup</label>
																	<select class="form-control select2" name="popup">
																		<option value="0" <?= $page->popup == 0?"selected":""?>>False</option>
																		<option value="1" <?= $page->popup == 1?"selected":""?> >True</option>
																	</select>
																</div>
															</div>

															<div class="form-group float-right">
																<input type="submit" class="btn btn-light btn-orange" value="Update">
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</tbody>
								
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</form>

</div>

<div class="modal fade" id="create_page" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create Page</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url();?>admin/create_page/">
					<div class="form-group mb-3">
						<label for="name">Page Name</label>
						<input type="text" class="form-control" id = "name" name="name" value="" required>
					</div>

					<div class="form-group mb-3">
						<label for="price">Page Content</label>
						<textarea class="form-control" id="description_long" name="content"></textarea>
					</div>

					<div class="row">
						<div class="form-group mb-3 col-md-6">
							<label for="price">Status</label>
							<select class="form-control" name="status">
								<option value="1">Active</option>
								<option value="0" >Inactive</option>
							</select>
						</div>
						<div class="form-group mb-3 col-md-6">
							<label for="price">Make Popup</label>
							<select class="form-control select2" name="popup">
								<option value="0">False</option>
								<option value="1" >True</option>
							</select>
						</div>
					</div>

					<div class="form-group float-right">
						<input type="submit" class="btn btn-light btn-orange" value="Create">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>