

<div class="content row">
    <div class="col-12">
        <div class="card">
			<div class="card-header">
				<a href="<?= base_url('admin/series_create/');?>" class="btn btn-light btn-orange  mb-2">
					<i class="fa fa-plus"></i> Create series
				</a>
			</div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="basic-datatable" class="table dt-responsive nowrap">
						<thead class='text-primary'>
							<tr>
								<th>
									#
								</th>
								<th></th>
								<th>Series Title</th>
								<th>Genre</th>
								<th>Operation</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$counter = 1;
								foreach ($series as $row):
								?>
							<tr>
								<td style="vertical-align: middle;"><?= $counter++;?></td>
								<td><img src="<?= $this->movie_model->get_thumb_url('series' , $row['series_id']);?>" class='img-fluid img-thumbnail ' style='width:50px;height:50px' /></td>
								<td style="vertical-align: middle;"><?= $row['title'];?></td>
								<td style="vertical-align: middle;">
									<?= $this->db->get_where('genre',array('genre_id'=>$row['genre_id']))->row()->name;?>
								</td>
								<td style="vertical-align: middle;">
									<div class="btn-group btn-group-sm">
										<a href="<?= base_url('browse/playseries/');?><?= $row['series_id'];?>"
											target="_blank" class="btn btn-outline-primary">
											<i class="mdi mdi-link"></i></a>
										<a href="<?= base_url('admin/series_edit/');?><?= $row['series_id'];?>" class="btn btn-outline-info">
										<i class="mdi mdi-pencil"></i></a>
										<a href="<?= base_url('admin/series_delete/');?><?= $row['series_id'];?>" class="btn btn-outline-danger" onclick="return confirm('Want to delete?')">
										<i class="mdi mdi-delete"></i></a>
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
