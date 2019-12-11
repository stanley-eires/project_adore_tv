<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/hover.css')?>" />

<?php include 'header_browse.php';?>
<!-- MOVIE LIST, GENRE WISE LISTING -->
<div class="page-header header-filter" filter-color="" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/biggi1.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="container mt-md-5">
		<!-- MOVIE LIST, GENRE WISE LISTING -->
		<?php
			$movies		=	$this->movie_model->get_mylist('movie');
			$series		=	$this->movie_model->get_mylist('series');
		?>
		<div class="row text-center no-gutters">
			<div class="col-12">
				<h4 class='text-capitalize display-4 text-left'>
					My List (<?= count($movies) + count($series);?>)
				</h4>
			</div>
			<?php 
				for ($i = 0; $i<count($movies) ; $i++){
					$title	=	$this->db->get_where('movie' , array('movie_id' => $movies[$i]))->row()->title;
					$link	=	base_url().'browse/playmovie/'.$movies[$i];
					$thumb	=	$this->movie_model->get_thumb_url('movie' , $movies[$i]);
					echo "<div class='col-6 col-md-4'>";
					echo $this->slidercarousel::create_thumbnail($thumb,$title,$link,"assets/img/Play.png","w-100");
					echo "</div>";
				}
					
				for ($i = 0; $i<count($series) ; $i++){
					$title	=	$this->db->get_where('series' , array('series_id' => $series[$i]))->row()->title;
					$link	=	base_url().'browse/playseries/' . $series[$i];
					$thumb	=	$this->movie_model->get_thumb_url('series' , $series[$i]);
					echo "<div class='col-6 col-md-4'>";
					echo $this->slidercarousel::create_thumbnail($thumb,$title,$link,"assets/img/Play.png","w-100");
					echo "</div>";
					
				}
			?>
		</div>
		<div class="col-12">
			<ul class="pagination">
				<?= $this->pagination->create_links(); ?>
			</ul>
		</div>
	</div>

</div>
<?php include 'footer.php';?>
