
<div class="content ">
	<div class="row">
		<div class="col-lg-8 col-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="<?= base_url();?>admin/series_edit/<?= $series_id;?>" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="title">Tv Series Title  <span class=' text-danger'>*</span></label>
								<input type="text" class="form-control" id = "title" name="title" required maxlength="20" value="<?= $series_details->title?>">
							</div>
							<div class="form-group col-md-4">
								<label for="title">Tv Series Trailer URL</label>
								<input type="url" class="form-control" id = "trailer_url" name="trailer_url" placeholder="https://www.youtube.com/watch?v=w4eUvGLuTPk&feature=youtu.be" value="<?= $series_details->trailer_url?>">
							</div>

							<div class="form-group col-md-4">
								<label for="poster">Poster</label>
								<span class="small">- banner of the series</span>
								<input type="file" class="form-control" name="poster"  accept="image/*">
							</div>
						</div>
						<div class="form-group mb-3">
								<label for="description_short">Short description <span class=' text-danger'>*</span></label>
								<textarea class="form-control" id="description_short" name="description_short" rows="6" maxlength="160" required><?= $series_details->description_short?></textarea>
							</div>
						<div class="form-group mb-3">
							<label for="description_long">Long description</label>
							<textarea class="form-control" id="description_long" name="description_long" rows="6"><?= $series_details->description_long?></textarea>
						</div>
						<div class="row mb-3">
							<div class="form-group col-md-6">
								<label for="director">Director <span class=' text-danger'>*</span></label>
								<span class="small">- select single director</span>								
								<select class="form-control select2" id="director" name="director" required>
									<option value="">Select a Director</option>
									<?php
										$directors	=	$this->movie_model->get_director();
										foreach ($directors as $row3):?>
									<option value="<?= $row3->director_id?>" <?= ($series_details->director == $row3->director_id)?'selected':''?> >
										<?=  $row3->name?>
									</option>
									<?php endforeach;?>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="actors">Actors <span class=' text-danger'> *</span></label>
								<span class="small">- select multiple actors</span>
								<select class="form-control custom-select" id="actors" multiple name="actors[]" required>
									<?php
										$actors	=	$this->movie_model->get_actor();
										foreach ($actors as $row2):?>
									<option
										<?php
											$actors_json	=	$series_details->actors;
											if ($actors_json != ''){
												$actor_array	=	json_decode($actors_json);
												if (in_array($row2->actor_id, $actor_array))
													echo 'selected';
											}
										?>
										value="<?= $row2->actor_id;?>">
										<?= $row2->name?>
									</option>
									<?php endforeach;?>
								</select>
							</div>

							<div class="form-group col-md-4">
								<label for="genre_id">Genre <span class=' text-danger'> *</span></label>
								<span class="small">- genre must be selected</span>
								<select class="form-control select2" id="genre_id" name="genre_id" required>
									<?php
										$genres	=	$this->movie_model->get_genre();
										foreach ($genres as $row2):?>
									<option
										<?= ( $series_details->genre_id == $row2->genre_id)?'selected':""?>
											value="<?= $row2->genre_id?>">
											<?= $row2->name;?>
									</option>
									<?php endforeach;?>
								</select>
							</div>

							<div class="form-group col-md-4">
								<label for="year">Publishing Year <span class=' text-danger'> *</span></label>
								<span class="small">- year of publishing time</span>
								<select class="form-control select2" id="year" name="year" required>
									<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
									<option <?= ( $series_details->year == $i)?'selected':""?>
											value="<?= $i?>"><?= $i?>
									</option>
									<?php endfor;?>
								</select>
							</div>

							<div class="form-group col-md-4">
								<label for="rating">Rating</label>
								<span class="small">- star rating of the series</span>
								<select class="form-control select2" id="rating" name="rating">
									<?php for ($i = 0; $i <= 5 ; $i++):?>
									<option
											<?php if ( $series_details->rating == $i) echo 'selected';?>
											value="<?= $i;?>">
											<?= $i;?>
										</option>
									<?php endfor;?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-6">
								<input type="submit" class="btn btn-light btn-orange btn-block" value="Update">
							</div>
							<div class="col-6">
								<a href="<?= base_url();?>admin/series_list" class="btn btn-secondary  btn-block">Go back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-12">
			<div class="card">
				<div class="card-body ">
					<div class="d-flex justify-content-between">
						<h6 >Seasons & episodes</h6>
						<a href="<?= base_url();?>admin/season_create/<?= $series_id;?>" class="btn btn-sm btn-light btn-orange">
							<i class="fa fa-plus"></i> Create Season
						</a>
					</div>
					<table class="table table-bordered">
						<tbody>
							<?php
								$seasons	=	$this->movie_model->get_seasons_of_series($series_id);
								foreach ($seasons as $row):
								?>
							<tr>
								<td>
									<?= $row['name'];?>
								</td>
								<td>
									<?php
										$episodes	=	$this->movie_model->get_episodes_of_season($row['season_id']);
										echo count($episodes);?> episode(s)
								</td>
								<td>
									<div class="btn-group btn-group-sm">
										<a href="<?= base_url();?>admin/season_edit/<?= $series_id.'/'.$row['season_id'];?>"
											class="btn btn-outline-info "><i class="fa fa-upload"></i>
										</a>
										<a href="<?= base_url();?>admin/season_delete/<?= $series_id.'/'.$row['season_id'];?>"
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
</div>
