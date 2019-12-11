<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<a href="<?= base_url('admin/movie_create/');?>" class="btn btn-light btn-orange mb-2 pulls-right">
						<i class="fa fa-plus"></i> Create Movie
					</a>
				</div>
            	<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatable" class="table dt-responsive nowrap">
							<thead class='text-primary'>
								<tr>
									<th>#</th>
									<th>Poster</th>
									<th>Movie Title</th>
									<th>Genre</th>
									<th>Operation</th>
								</tr> 
							</thead>
							<tbody>
								<?php
									$counter = 1;
									foreach ($movies as $row): 
								?>
								<tr>
									<td style="vertical-align: middle;"><?= $counter++;?></td>
									<td><img src="<?= $this->movie_model->get_thumb_url('movie' , $row['movie_id']);?>" class='img-thumbnail ' style='width:70px;height:50px' /></td>
									<td style="vertical-align: middle;"><?= $row['title'];?></td>
									<td style="vertical-align: middle;">
										<?= $this->db->get_where('genre',array('genre_id'=>$row['genre_id']))->row()->name;?>
									</td>
									<td style="vertical-align: middle;">
										<div class='btn-group btn-group-sm'>
											<a href="<?= base_url('browse/playmovie');?>/<?= $row['movie_id'];?>"
												target="_blank" class="btn btn-outline-primary">
											<i class="mdi mdi-link"></i> </a>
											<a href="<?= base_url('admin/movie_edit/');?><?= $row['movie_id'];?>" class="btn btn-outline-info"><i class="mdi mdi-pencil"></i>
											</a>
											<a href="<?= base_url('admin/movie_delete/');?><?= $row['movie_id'];?>" class="btn btn-outline-danger" onclick="return confirm('Want to delete?')"><i class="mdi mdi-delete"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
            	</div>
        	</div>
		</div>
	</div>
</div>
