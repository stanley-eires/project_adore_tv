<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/hover.css')?>" />
<link rel="stylesheet" href="<?= base_url('assets/plyr/plyr.css');?>">
<?php include 'header_browse.php';?>
<style>
	.video_cover {
		position: relative;
		padding-bottom: 30px;
	}
	.video_cover:after {
	content : "";
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	background-image: url(<?= $this->movie_model->get_poster_url('series' , $eries_id);?>);
	width: 100%;
	height: 100%;
	opacity : 0.2;
	z-index: -1;
	background-size:cover;
	background-position:center;
	}
</style>

	<!-- VIDEO PLAYER -->
	<div class="video_cover" >
		<div class="container-fluid">
			<div class="row">
				<div class="col-12" id="movie_div">
					<div class="card card-plain">
						<div class="card-body">
							<?= $this->videoplayer->play_video($episode->url) ?> 
						</div>
					</div>
				</div>	

				<div class="col-12 d-none " id="trailer_div">
					<div class="card card-plain">
						<div class="card-body">
							<?= $this->videoplayer->play_video($episode->url) ?> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $series_details = $this->db->get_where('series',['series_id'=>$series_id])->row()?>


	<!-- VIDEO DETAILS HERE -->
<div class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<div class="row no-gutters ">
				<div class="col-md-3 text-center">
					<img src="<?= $this->movie_model->get_thumb_url('series' , $episode->episode_id);?>" style="width:100px;height:100px" class='img-thumbnail'/>
				</div>
				<div class="col-lg-9">
					<!-- VIDEO TITLE -->
					<h3 class='fa-2x font-weight-bold text-white'><?= $series_details->title;?></h3>
					<!-- RATING CALCULATION -->
					<div>
						<?php
							for($i = 1 ; $i <= $series_details->rating ; $i++):
							?>
						<i class="fa fa-star text-orange"></i>
						<?php endfor;?>
						<?php
							for($i = 5 ; $i > $series_details->rating ; $i--):
							?>
						<i class="fa fa-star-o"></i>
						<?php endfor;?>
					</div>
				</div>
			</div>
		</div>
		<script>
			// submit the add/delete request for mylist
			// type = movie/series, task = add/delete, id = movie_id/series_id
			process_list = (type, task, id)=>{
				$("#mylist_button_holder").html( $("#btn-loader").html() );
				$.ajax({
					url: `<?= base_url('browse/process_list/')?>${type}/${task}/${id}`, 
					success: function(result){
					if (task == 'add'){
						$("#mylist_button_holder").html( $("#mylist_delete_button").html() );
					}
					else if (task == 'delete'){
						$("#mylist_button_holder").html( $("#mylist_add_button").html() );
					}
				}});
			}

			// Show the add/delete wishlist button on page load
			   $( document ).ready(function() {
					// Checking if this movie_id exist in the active user's wishlist
					mylist_exist_status = "<?= $this->movie_model->check_in_mylist('series' , $series_id);?>";

					if (mylist_exist_status == 'true')
					{
						$("#mylist_button_holder").html( $("#mylist_delete_button").html() );
					}
					else if (mylist_exist_status == 'false')
					{
						$("#mylist_button_holder").html( $("#mylist_add_button").html() );
					}
				});
		</script>
		<div class="col-lg-4">
			<!-- ADD OR DELETE FROM PLAYLIST -->
			<span id="mylist_button_holder"></span>
			<span id="mylist_add_button" class='d-none'>
				<button class="btn btn-orange" onclick="process_list('series' , 'add', <?= $series_id?>)"><i class="fa fa-plus"></i> Add to my list
				</button>
			</span>
			<span id="mylist_delete_button" class='d-none'>
				<button  class="btn btn-info"
					onclick="process_list('movie' , 'delete', <?= $series_id?>)">
				<i class="fa fa-times"></i> Remove from my list
				</button>
			</span>
			

			<span id='btn-loader' class='d-none'>
				<button class="btn btn-outline-light " >
					<span class="spinner-border spinner-border-sm text-primary"></span> Please Wait...
				</button>
			</span>

			<button class="btn " id = 'watch_button' onclick="divToggle()"><i class="fa fa-eye"></i> Watch Trailer</button>
			
			<!-- MOVIE GENRE -->
			<div style="margin-top: 10px;">
				<strong><?= ('Genre');?></strong> :
				<a href="<?= base_url();?>browse/movie/<?= $series_details->genre_id;?>">
				<?= $this->db->get_where('genre',array('genre_id'=>$series_details->genre_id))->row()->name;?>
				</a>
			</div>
			<!-- MOVIE YEAR -->
			<div>
				<strong><?= ('Year');?></strong> : <?= $series_details->year;?>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-12">
			<ul class="nav nav-tabs mb-3 nav-fill">
				<li class="nav-item ">
					<a class="nav-link " href="#about" data-toggle="tab">
						<?= ('About');?>
					</a>
				</li>
				<li class="nav-item ">
					<a  class="nav-link active" href="#episode" data-toggle="tab">
						<?= ('Episode');?>
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="#cast" data-toggle="tab">
						<?= ('Cast');?>
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="#director" data-toggle="tab">
						<?= ('Director');?>
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="#more" data-toggle="tab">
						<?= ('More');?>
					</a>
				</li>
			</ul>
			<hr>
			<div id="myTabContent" class="tab-content text-white">
				<!-- TAB FOR DESCRIPTION -->
				<div class="tab-pane" id="about">
					<p>
						<?= $series_details->description_long?>
					</p>
				</div>
				<!-- TAB FOR EPISODES -->
				<div class="tab-pane active in" id="episode">
					<div class="dropdown">
						<button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<?= $this->db->get_where('season', array('season_id'=>$season_id))->row()->name;?>
						</button>
						<div class="dropdown-menu" aria-labelledby="my-dropdown">
							<?php
								$seasons	=	$this->db->get_where('season', array('series_id'=>$series_id))->result();
								foreach ($seasons as $row2):
							?>
							<a class="dropdown-item" href="<?= base_url();?>browse/playseries/<?= $series_id.'/'.$row2->season_id?>"><?= $row2->name?></a>
							<?php endforeach?>
						</div>
					</div>
					
					<div class="row">
						<?php
							$counter	=	0;
							$episodes	=	$this->movie_model->get_episodes_of_season($season_id);
							foreach ($episodes as $row2):
							?>
						<div class="col-3 col-md-2 text-center">
							<a href="<?= site_url('browse/playseries/'.$series_id.'/'.$season_id.'/'.$row2['episode_id']) ?>">
								<img src="<?= $this->movie_model->get_thumb_url('episode' , $row2['episode_id']);?>"
								class='w-100 img-thumbnail' />
								<span class="d-block"><?= $row2['title'];?></span>
							</a>
						</div>
						<?php endforeach;?>
					</div>
				</div>
				<!-- TAB FOR ACTORS -->
				<div class="tab-pane " id="cast">
					<div class="row ">
						<?php
							$actors	=	json_decode($series_details->actors);
							for($i = 0; $i< sizeof($actors) ; $i++){?> 
							<div class="col-3 col-md-2 text-center">
								<img src="<?= $this->movie_model->get_actor_image_url($actors[$i]);?>"
								class='w-100 img-thumbnail'/>
								<span class='d-block'><?= $this->db->get_where('actor', array('actor_id'=>$actors[$i]))->row()->name;?></span>
							</div>
						<?php }?>
					</div>
				</div>
				<div class="tab-pane " id="director">
					<div class='text-center'>
						<?php $director_id = $this->db->get_where('director', array('director_id'=>$series_details->director))->row()->director_id; ?>
						<div class="row">
							<div class="col-3 col-md-2 mx-auto">
								<img src="<?= $this->movie_model->get_director_image_url($director_id);?>"  class='w-100 img-thumbnail'/>
								<span class='d-block text-white'>
									<?= $this->db->get_where('director', array('director_id'=>$series_details->director))->row()->name;?>
								</span>
							</div>
						</div>			
						
					</div>
				</div>
				<!-- TAB FOR SAME CATEGORY MOVIES -->
				<div class="tab-pane  " id="more">
					<?php $this->slidercarousel->_showCarouselSlide($this->movie_model->get_genre($series_details->genre_id,"name"),$series_details->genre_id,"series");?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function divToggle() {
		if ($('#trailer_div').hasClass('hidden')) {
			$('#trailer_div').removeClass('hidden');
			$('#series_div').addClass('hidden');
			$('#watch_button').html('<?= '<i class="fa fa-eye"></i> '.('watch_series') ?>');
			player.pause();
		}else {
			$('#series_div').removeClass('hidden');
			$('#trailer_div').addClass('hidden');
			$('#watch_button').html('<?= '<i class="fa fa-eye"></i> '.('watch_trailer') ?>');
			trailer_url.pause();
		}
		$("html, body").animate({scrollTop: 0}, 500);
	}
</script>
<div class='text-white'>
	<?php include 'footer.php';?>
</div>
