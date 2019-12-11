
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/hover.css')?>" />
<!-- TOP FEATURED SECTION -->

<?php include 'header_browse.php';?>

<div class="" >
	<div class=" page-header clear-filter" filter-color="white" style='display:flex;align-items:center;justify-content:flex-start'>
		<div class="page-header-image" data-parallax="true" style="background-size:contain;background-image: url(<?= $this->movie_model->get_poster_url('movie' , $featured_movie->movie_id);?>);">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7">
					<div class="brand">
						<h1 class="display-1 text-uppercase font-weight-bolder"><?= $featured_movie->title;?></h1>
						<div class='mt-5'>
							<a href="<?= base_url('browse/playmovie/');?><?= $featured_movie->movie_id;?>" class="btn btn-primary btn-lg"><i class="fa fa-play"></i> <?= ('PLAY');?>
							</a>
							<!-- ADD OR DELETE FROM PLAYLIST -->
							<span id="mylist_button_holder" class=''></span>
							<span id="mylist_add_button" class="d-none">
								<a href="#" class="btn btn-lg btn-outline-light" onclick="process_list('movie' , 'add', <?= $featured_movie->movie_id;?>)"><i class="fa fa-plus"></i> ADD TO MY LIST
								</a>
							</span>
							<span id='btn-loader' class='d-none'>
								<button class="btn btn-lg btn-outline-light " >
									<span class="spinner-border spinner-border-sm text-primary"></span> Please Wait...
								</button>
							</span>

							<span id="mylist_delete_button" class="d-none">
								<a href="#" class="btn btn-lg btn-light" onclick="process_list('movie' , 'delete', <?= $featured_movie->movie_id;?>)"> 
									<i class="fa fa-times"></i> REMOVE FROM MY LIST
								</a>
							</span>
						</div>
					</div>
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
			mylist_exist_status = <?= $this->movie_model->check_in_mylist('movie' , $featured_movie->movie_id)?>;
		
			if (mylist_exist_status == true){
				$("#mylist_button_holder").html( $("#mylist_delete_button").html() );
			}
			else if (mylist_exist_status == false){
				$("#mylist_button_holder").html( $("#mylist_add_button").html() );
			}
		});
	</script>

	<div class='container-fluid' >
		<!-- MY LIST, GENRE WISE LISTING & SLIDER -->
		<?php 
		$genres		=	$this->movie_model->get_genre();
		foreach ($genres as $row){
			// count movie number of this genre, if no found then return.
			$total_result = $this->db->where('genre_id' , $row->genre_id)->count_all_results('movie');
			if ($total_result == 0)
				continue;
			$this->slidercarousel->_showCarouselSlide($row->name,$row->genre_id);
			
		}
		?>

	</div>

	<div class="border-top mt-5 border-secondary text-white">
	<?php include 'footer.php';?>
	</div>
</div>

