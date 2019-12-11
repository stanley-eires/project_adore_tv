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
	background-image: url(<?= $this->movie_model->get_poster_url('movie' , $movie_details->movie_id);?>);
	width: 100%;
	height: 100%;
	opacity : 0.2;
	z-index: -1;
	background-size:cover;
	background-position:center;
	}
</style>
<!-- VIDEO PLAYER -->

<div class="video_cover m-0" >
	<div class="container-fluid ">
		<div class="row">
			<div class="col-12" id="movie_div">
				<div class="card card-plain">
					<div class="card-body">
						<?= $this->videoplayer->play_video($movie_details->url,$this->movie_model->get_poster_url("movie", $movie_details->movie_id)) ?> 
					</div>
				</div>
			</div>	

			<div class="col-12 d-none " id="trailer_div">
				<div class="card card-plain">
					<div class="card-body">
						<?= $this->videoplayer->play_video($movie_details->trailer_url) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- VIDEO DETAILS HERE -->
<div class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<div class="row no-gutters ">
				<div class="col-md-3 text-center">
					<img src="<?= $this->movie_model->get_thumb_url('movie' , $movie_details->movie_id);?>" style="width:100px;height:100px" class='img-thumbnail'/>
				</div>
				<div class="col-md-9">
					<!-- VIDEO TITLE -->
					<h3 class='fa-2x font-weight-bold text-white'><?= $movie_details->title;?></h3>
					<!-- RATING CALCULATION -->
					<div>
						<?php
							for($i = 1 ; $i <= $movie_details->rating ; $i++):
							?>
						<i class="fa fa-star text-orange"></i>
						<?php endfor;?>
						<?php
							for($i = 5 ; $i > $movie_details->rating ; $i--):
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
			    mylist_exist_status = "<?= $this->movie_model->check_in_mylist('movie' , $movie_details->movie_id);?>";

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


		<div class="col-md-4 text-white">
			<!-- ADD OR DELETE FROM PLAYLIST -->
			<span id="mylist_button_holder"></span>
			<span id="mylist_add_button" class='d-none'>
				<button class="btn btn-orange" onclick="process_list('movie' , 'add', <?= $movie_details->movie_id;?>)"><i class="fa fa-plus"></i> Add to my list
				</button>
			</span>
			<span id="mylist_delete_button" class='d-none'>
				<button  class="btn btn-info"
					onclick="process_list('movie' , 'delete', <?= $movie_details->movie_id;?>)">
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
				<a href="<?= base_url();?>browse/movie/<?= $movie_details->genre_id;?>">
				<?= $this->db->get_where('genre',array('genre_id'=>$movie_details->genre_id))->row()->name;?>
				</a>
			</div>
			<!-- MOVIE YEAR -->
			<div>
				<strong><?= ('Year');?></strong> : <?= $movie_details->year;?>
			</div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-12">
			<ul class="nav nav-tabs mb-3 nav-fill">
				<li class="nav-item ">
					<a class="nav-link active " href="#about" data-toggle="tab">
						<?= ('About');?>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#cast" data-toggle="tab">
						<?= ('Cast');?>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#director" data-toggle="tab">
						<?= ('Director');?>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#more" data-toggle="tab">
						<?= ('More');?>
					</a>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content text-white">
				<!-- TAB FOR TITLE -->
				<div class="tab-pane active in" id="about">
					<p class='text-justify'><?= $movie_details->description_long;?></p>
				</div>
				<!-- TAB FOR ACTORS -->
				<div class="tab-pane " id="cast">
					<div class="row ">
						<?php
							$actors	=	json_decode($movie_details->actors);
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
						<?php $director_id = $this->db->get_where('director', array('director_id'=>$movie_details->director))->row()->director_id; ?>
						<div class="row">
							<div class="col-3 col-md-2 mx-auto">
								<img src="<?= $this->movie_model->get_director_image_url($director_id);?>"  class='w-100 img-thumbnail'/>
								<span class='d-block text-white'>
									<?= $this->db->get_where('director', array('director_id'=>$movie_details->director))->row()->name;?>
								</span>
							</div>
						</div>			
						
					</div>
				</div>
				<!-- TAB FOR SAME CATEGORY MOVIES -->
				<div class="tab-pane  " id="more">
					<?php $this->slidercarousel->_showCarouselSlide($this->movie_model->get_genre($movie_details->genre_id,"name"),$movie_details->genre_id);?>
					
				</div>
			</div>
		</div>
	</div>
	

	<script type="text/javascript">
		function divToggle() {
			if ($('#trailer_div').hasClass('d-none')) {
				$('#trailer_div').removeClass('d-none');
				$('#movie_div').addClass('d-none');
				$('#watch_button').html('<?= '<i class="fa fa-video"></i> '.('Watch Movie') ?>');
				player.pause();
			}else {
				$('#movie_div').removeClass('d-none');
				$('#trailer_div').addClass('d-none');
				$('#watch_button').html('<?= '<i class="fa fa-film"></i> '.('Watch Trailer') ?>');
				trailer_url.pause();
			}
			$("html, body").animate({scrollTop: 0}, 500);
		}
	</script>
	<script src="<?= base_url('assets/plyr/plyr.js')?>"></script>
	<script>const player = new Plyr('#player');</script>
	<script>const trailer_url = new Plyr('#trailer_url');</script>
	<hr style="border-top:1px solid #333;">
	
</div>
<div class='text-white'>
	<?php include 'footer.php';?>
</div>
 
