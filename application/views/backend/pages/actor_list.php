
<div class="row content">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
				<h4 class="header-title">Actor List</h4>
				<div class="">
					<table id="basic-datatable" class="table nowrap" width="100%">
						<thead class='text-primary'>
							<tr>
								<th>#</th>
								<th>Thumbnail</th>
								<th>Actor Name</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$counter = 1;
								foreach ($actors as $row):
								?>
							<tr>
								<td style="vertical-align: middle;"><?= $counter++;?></td>
								<td><a href="<?= base_url().'admin/actor_wise_movie_and_series/'.$row->actor_id; ?>"><img src="<?= $this->movie_model->get_actor_image_url($row->actor_id);?>" class='img-fluid img-thumbnail ' style='width:70px;height:70px' /></a></td>
								<td style="vertical-align: middle;"><a href="<?= base_url().'admin/actor_wise_movie_and_series/'.$row->actor_id; ?>" class='font-weight-bold text-dark'><?= $row->name;?> <sup class='ml-2'><i class="fa fa-link"></i></sup></a></td>
								<td style="vertical-align: middle;"  >
									<div class='btn-group btn-group-sm'>
										<a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#edit<?= $row->actor_id;?>" data-backdrop='static' class="btn btn-outline-info">
										<i class="mdi mdi-pencil"></i></a>
										<a href="<?= base_url();?>admin/actor_delete/<?= $row->actor_id;?>" class="btn btn-outline-danger" onclick="return confirm('Want to delete? This could cause problems especially when already linked to existing files')">
										<i class="mdi mdi-delete"></i></a>
									</div>
									
								</td>
							</tr>
							<!-- Modal -->
							<div class="modal fade" id="edit<?= $row->actor_id;?>" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit Actor</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<form method="post" action="<?= base_url();?>admin/actor_edit/<?= $row->actor_id;?>" enctype="multipart/form-data">
												<div class="row">
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="name">Actor Name</label>
															<input type="text" class="form-control" id = "name" name="name" value="<?= $row->name;?>">
														</div>
														<div class="form-group mb-3">
															<label for="thumb">Image</label>
															<input type="file" class="form-control" name="actor_thumb">
														</div>
														
														<div class="form-group float-right">
															<input type="submit" class="btn btn-light btn-orange" value="Update">
														</div>
													</div>
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
	<div class="col-md-4">
		<div class="card">
            <div class="card-body">
				<h4 class="card-title">Create Actor</h4>
				<form method="post" action="<?= base_url();?>admin/actor_create" enctype="multipart/form-data">
					<div class="row justify-content-center">
						<div class="col-12">
							<div class="form-group mb-3">
			                    <label for="name">Actor Name</label>
								<span class="help">e.g. "Funke Akindele"</span>
			                    <input type="text" class="form-control" id = "name" name="name">
			                </div>
							<div class="form-group mb-3">
			                    <label for="name">Image</label>
			                    <input type="file" class="form-control" name="actor_thumb">
			                </div>
							<div class="form-group float-right">
								<input type="submit" class="btn btn-light btn-orange" value="Create">
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
