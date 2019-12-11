

<div class="content row">
    <div class="col-md-7">
        <div class="card">
			<div class="card-header">
				<h4 class="header-title">Genre List</h4>
			</div>
            <div class="card-body"> 
                <table id="basic-datatable" class="table dt-responsive nowrap w-100" >
					<thead class='text-primary'>
						<tr>
							<th>
								#
							</th>
							<th>Genre Name</th>
							<th>Operation <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Disabled buttons signifies the genre has already be linked with a movie/series & cannot be deleted"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$counter = 1;
							foreach ($genres as $row):
							  ?>
						<tr>
							<td><?= $counter++;?></td>
							<td class='text-capitalize'><?= $row->name?></td>
							<td class='btn-group btn-group-sm'>
								<a href="<?= base_url('admin/genre_edit/');?><?= $row->genre_id;?>" class="btn btn-outline-info" data-toggle="modal" data-target="#edit<?= $row->genre_id;?>" data-backdrop='static'>
								<i class="mdi mdi-pencil"></i></a>
								<?php
									$movie_used = $this->db->get_where('movie',['genre_id'=>$row->genre_id])->num_rows();
									$series_used = $this->db->get_where('series',['genre_id'=>$row->genre_id])->num_rows();
								?>
                                
								<a <?= $movie_used > 0 || $series_used > 0?"disabled":"" ?>  href="<?= base_url('admin/genre_delete/'.$row->genre_id)?>" class="btn btn-outline-danger" onclick="return confirm('Want to delete?')">
								<i class="mdi mdi-delete"></i></a>
							</td>
						</tr>
						<!-- Modal -->
						<div class="modal fade" id="edit<?= $row->genre_id?>" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Genre</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									<div class="modal-body">
										<form method="post" action="<?= base_url();?>admin/genre_edit/<?= $row->genre_id?>">
											<div class="form-group mb-3">
												<label for="name">Genre Name</label>
												<span class="help">e.g. "Action, Romantic"</span>
												<input type="text" class="form-control" id = "name" name="name" value="<?= $row->name?>" required>
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
	<div class="col-md-5">
        <div class="card">
			<div class="card-header">
				<h4 class="header-title">Genre Create</h4>
			</div>
            <div class="card-body">
				<form method="post" action="<?= base_url('admin/genre_create');?>">
					<div class="row">
						<div class="col-12">
							<div class="form-group mb-3">
			                    <label for="name">Genre Name</label>
								<span class="help">e.g. "Action, Romantic"</span>
			                    <input type="text" class="form-control" id = "name" name="name" required>
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
