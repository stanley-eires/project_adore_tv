<div class="content">
	<div class="row">
		<div class="col-12">
			<a href="<?= base_url();?>admin/series_edit/<?= $series_id;?>"
				class="btn btn-light">
				<i class="mdi mdi-arrow-left-drop-circle-outline"></i> Back to series
			</a>
			<a href="<?= base_url();?>browse/playseries/<?= $series_id.'/'.$season_id;?>"
				class="btn btn-secondary" target="_blank">
				<i class="mdi mdi-arrow-top-right"></i>
				Visit <?= $season_name;?>
			</a>
			<a href="#" onClick="load_create_form()"
				class="btn btn-light btn-orange float-right" >
			<i class="fa fa-plus"></i> Create episode
			</a>
		</div>
		<div class="col-md-7 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class='card-title'>Episode list</h4>
				</div>
				<div class="card-body">
					<?php $episodes	=	$this->movie_model->get_episodes_of_season($season_id);?>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Operation</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$counter	=	1;
									foreach ($episodes as $row):
									$episode_id	=	$row['episode_id'];
									?>
								<tr>
									<td>
										<?= 'Episode '.$counter++;?>
									</td>
									<td>
										<?= $row['title'];?>
									</td>
									<td>
										<div class="btn-group btn-group-sm">
											<a href="#" onClick="load_edit_form(<?= $series_id.','.$season_id.','.$episode_id;?>)"
												class="btn btn-outline-info ">
											<i class="fa fa-edit"></i></a>
											<a href="<?= base_url();?>admin/episode_delete/<?= $series_id.'/'.$season_id.'/'.$episode_id;?>" 
												class="btn btn-outline-danger " onclick="return confirm('Want to delete?')">
											<i class="fa fa-trash"></i></a>
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
		<script>
			function load_edit_form(series_id,season_id,episode_id){
				document.getElementById("form_holder").innerHTML = document.getElementById("edit_episode_form_"+episode_id).innerHTML;
			}
			
			// LOAD THE CREATE EPISODE FORM AT FIRST
			window.onload = function (){
				load_create_form()
			}
			
			function load_create_form(){
				document.getElementById("form_holder").innerHTML = document.getElementById("create_episode_form").innerHTML;
			}
		</script>
		<!-- MANAGE SEASONS & EPISODES -->
		<div class="col-md-5 col-12" id="form_holder">
		</div>
		<!-- CREATE EPISODE FORM -->
		<div id="create_episode_form" class='d-none'>
			<div class="card">
				<div class="card-header">
					<h4 class='card-title'>Create a new episode</h4>
				</div>
				<div class="card-body">
					<form method="post" action="<?= base_url();?>admin/episode_create/<?= $series_id.'/'.$season_id;?>"
						enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-label">Title</label>
							<span class="small"></span>
							<div class="controls">
								<input type="text" class="form-control" name="title" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Video Url</label>
							<span class="small">- youtube or any hosted video</span>
							<div class="controls">
								<input type="url" class="form-control" name="url" id="url" required>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">Thumbnail</label>
							<span class="small">- icon image of the movie</span>
							<div class="controls">
								<input type="file" class="form-control" name="thumb">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-light btn-orange" value="Create Episode">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- EDIT EPISODE FORM -->
		<?php
			foreach ($episodes as $row):
			$episode_id	=	$row['episode_id'];
			?>
			<div id="edit_episode_form_<?= $row['episode_id'];?>" class='d-none'>
				<div class="card">
					<div class="card-header">
						<h4 class='card-title'>Edit episode</h4>
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url();?>admin/episode_edit/<?= $series_id.'/'.$season_id.'/'.$episode_id;?>"
							enctype="multipart/form-data">
							<div class="form-group">
								<label class="form-label">Title</label>
								<span class="small"></span>
								<div class="controls">
									<input type="text" class="form-control" name="title" value="<?= $row['title'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Video Url</label>
								<span class="small">- youtube or any hosted video</span>
								<div class="controls">
									<input type="text" class="form-control" name="url" id="url" value="<?= $row['url'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Thumbnail</label>
								<span class="small">- icon image of the movie</span>
								<div class="controls">
									<input type="file" class="form-control" name="thumb">
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-light btn-orange" value="Update Episode">
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</div>
	