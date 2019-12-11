
<div class="content row"> 
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
				<h4 class="header-title">Director List</h4>
				<div class="table-responsive">
					<table id="basic-datatable" class="table dt-responsive nowrap w-100">
						<thead class='text-primary'>
							<tr>
								<th>#
								</th>
								<th>Thumbnail</th>
								<th>Director Name</th>
								<th>Operation <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Disabled buttons signifies the genre has already be linked with a movie/series & cannot be deleted"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$counter = 1;
								foreach ($directors as $row):
								?>
							<tr>
								<td style="vertical-align: middle;"><?= $counter++;?></td>
								<td><a href="<?= base_url().'admin/director_wise_movie_and_series/'.$row->director_id; ?>"><img src="<?= $this->movie_model->get_director_image_url($row->director_id);?>"  class='img-fluid img-thumbnail ' style='width:50px;height:50px'/></a></td>
								<td style="vertical-align: middle;"><a href="<?= base_url().'admin/director_wise_movie_and_series/'.$row->director_id; ?>" class='font-weight-bold text-dark'><?= $row->name;?><sup class='ml-2'><i class="fa fa-link"></i></sup></a></td>
								<td style="vertical-align: middle;"  >
									<div class='btn-group btn-group-sm'>
										<a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#edit<?= $row->director_id;?>" data-backdrop='static'>
										<i class="mdi mdi-pencil"></i></a>
										<?php
											$movie_used = $this->db->get_where('movie',['director'=>$row->director_id])->num_rows();
											$series_used = $this->db->get_where('series',['director'=>$row->director_id])->num_rows();
										?>
										<a <?= $movie_used > 0 || $series_used > 0?"disabled":"" ?> href="<?= base_url();?>admin/director_delete/<?= $row->director_id;?>" class="btn btn-outline-danger" onclick="return confirm('Want to delete? This could cause problems especially when already linked to movie/series')">
										<i class="mdi mdi-delete"></i></a>
									</div>
									
								</td>
							</tr>
							<!-- Modal -->
							<div class="modal fade" id="edit<?= $row->director_id;?>" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit Director</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<form method="post" action="<?= base_url();?>admin/director_edit/<?= $row->director_id;?>" enctype="multipart/form-data">
												<div class="row">
													<div class="col-12">
														<div class="form-group mb-3">
															<label for="name">Actor Name</label>
															<input type="text" class="form-control" id = "name" name="name" value="<?= $row->name;?>" required>
														</div>
														<div class="form-group mb-3">
															<label for="thumb">Image</label>
															<input type="file" class="form-control" name="director_thumb">
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
				<h4>Create Director</h4>
				<form method="post" action="<?= base_url();?>admin/director_create" enctype="multipart/form-data">
					<div class="form-group mb-3">
						<label for="name">Actor Name</label>
						<span class="help">e.g. "Kunle Afolayan"</span>
						<input type="text" class="form-control" id = "name" name="name" required>
					</div>
					<div class="form-group mb-3">
						<label for="name">Image</label>
						<input type="file" accept='image/*' class="form-control" name="director_thumb">
					</div>
					<div class="form-group float-right">
						<input type="submit" class="btn btn-light btn-orange" value="Create">
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
