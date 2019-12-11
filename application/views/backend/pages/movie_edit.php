<link rel="stylesheet" href="<?= base_url('assets/plyr/plyr.css');?>">
<div class="content">
	<div class="row">
	    <div class="col-lg-8 col-12">
			<form method="post" action="<?= base_url();?>admin/movie_edit/<?= $movie_id;?>" enctype="multipart/form-data">
				<div class="card">
					<div class="card-body">
						<div class="row mb-3">
							<div class="form-group col-md-6">
								<label>Movie Title <span class=' text-danger'>*</span></label>
								<input type="text" class="form-control"  name="title" value="<?= $movie_detail->title;?> " required maxlength="20">
							</div>
							<div class="form-group col-md-6">
								<label for="">Poster</label>
								<span class="small">- large banner image of the movie</span>
								<input type="file" class="form-control" name="poster" accept="image/*">
							</div>
						
							<div class="form-group col-md-6">
								<label for="trailer_url">Trailer Url</label>
								<span class="small">- youtube/vimeo or self hosted video</span>
								<input type="url" class="form-control" name="trailer_url" id="trailer_url" value="<?= $movie_detail->trailer_url;?>" placeholder="https://www.youtube.com/watch?v=w4eUvGLuTPk&feature=youtu.be">
							</div>
							<div class="form-group col-md-6">
								<label for="url">Video Url<span class=' text-danger'> *</span></label>
								<span class="small">- youtube/vimeo or self hosted video</span>
								<input type="url" class="form-control" name="url" id="url" value="<?= $movie_detail->url;?>" required placeholder="https://player.vimeo.com/video/370747767">
							</div>
						</div>

						<div class="form-group col-12">
							<label for="description_long">Long description</label>
							<textarea class="form-control" id="description_long" maxlength="300" name="description_long" rows="6" ><?= $movie_detail->description_long;?></textarea>
						</div>

						<div class="form-group col-12">
							<label for="description_short">Short description <span class=' text-danger'> *</span></label>
							<textarea class="form-control" id="description_short" maxlength="160" name="description_short" rows="6" required><?= $movie_detail->description_short;?></textarea>
						</div>

						<div class="row mb-3">
							<div class="form-group col-md-6">
								<label for="director">Director</label>
								<span class="small">- select single director</span>								
								<select class="form-control select2" id="director" name="director" required>
									<option value="">Select a Director</option>
									<?php
										$directors	=	$this->movie_model->get_director();
										foreach ($directors as $row3):?>
									<option value="<?= $row3->director_id?>" <?= ($movie_detail->director == $row3->director_id)?'selected':''?>>
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
											$actors_json	=	$movie_detail->actors;
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

							<div class="form-group col-md-6">
								<label for="genre_id">Genre <span class=' text-danger'> *</span></label>
								<span class="small">- genre must be selected</span>
								<select class="form-control select2" id="genre_id" name="genre_id" required>
									<?php
										$genres	=	$this->movie_model->get_genre();
										foreach ($genres as $row2):?>
									<option
										<?= ( $movie_detail->genre_id == $row2->genre_id)?'selected':""?>
										value="<?= $row2->genre_id?>">
										<?= $row2->name;?>
									</option>
									<?php endforeach;?>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="year">Publishing Year <span class=' text-danger'> *</span></label>
								<span class="small">- year of publishing time</span>
								<select class="form-control select2" id="year" name="year" required>
									<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
									<option
										<?= ( $movie_detail->year == $i)?'selected':""?>
										value="<?= $i?>">
										<?= $i?>
									</option>
									<?php endfor;?>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="rating">Rating</label>
								<span class="small">- star rating of the movie</span>
								<select class="form-control select2" id="rating" name="rating">
									<?php for ($i = 0; $i <= 5 ; $i++):?>
									<option
										<?php if ( $movie_detail->rating == $i) echo 'selected';?>
										value="<?= $i;?>">
										<?= $i;?>
									</option>
									<?php endfor;?>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="featured">Featured</label>
								<span class="small">- Will be shown in home page</span>
								<select class="form-control select2" id="featured" name="featured">
									<option value="0" <?php if ( $movie_detail->featured == 0) echo 'selected';?>>No</option>
									<option value="1" <?php if ( $movie_detail->featured == 1) echo 'selected';?>>Yes</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-6">
								<input type="submit" class="btn btn-light btn-orange btn-block" value="Update Movie">
							</div>
							<div class="form-group col-6">
								<a href="<?= base_url();?>admin/movie_list" class="btn btn-block btn-secondary">Go back</a>
							</div>
						</div>
					</div>
				</div>
			</form>
	    </div>
		<div class="col-lg-4 col-12">
			<div class="row"> 
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Preview:</label>
								<?= $this->videoplayer->play_video($movie_detail->url,$this->movie_model->get_poster_url("movie",$movie_id)) ?> 
							</div>
						</div>
					</div>
				</div>
				<?php if($movie_detail->trailer_url != "") :?>
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label class="form-label">Trailer:</label>
								<?= $this->videoplayer->play_video($movie_detail->trailer_url,$this->movie_model->get_poster_url("movie",$movie_id)) ?> 

							</div>
						</div>
					</div>
				</div>
				<?php endif?>
			</div>
				
		</div>
	</div>
</div>


<script src="<?= base_url();?>assets/plyr/plyr.js"></script>
<script>
	const player = new Plyr('#player');
	const trailer = new Plyr('#trailer_player');

</script>

