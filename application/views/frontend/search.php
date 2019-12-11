<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/hover.css')?>" />

	<?php include 'header_browse.php';?>
<div class="page-header header-filter" filter-color="orange" style='max-height:99999px'>
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/bg18.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="container mt-5 content">
		<div class="row text-center no-gutters">
			<div class="col-12">
				<h1 class=' text-left'>Search result for: <?= $search_key;?></h1>	
			</div>
			<?php 
				foreach ($search_result as $row){
					$title	=	$row['title'];
					$link	=	$row['type']=="movie"? base_url().'browse/playmovie/'.$row['movie_id']:base_url().'browse/playseries/'.$row['series_id'];
					$thumb	=	$row['type']=="movie"?$this->movie_model->get_thumb_url('movie' , $row['movie_id']):$this->movie_model->get_thumb_url('series' , $row['series_id']);
					echo "<div class='col-6 col-md-4'>";
					echo $this->slidercarousel::create_thumbnail($thumb,$title,$link,"assets/img/Play.png","w-100");
					echo "</div>";
				}
			?>
		</div>
	</div>
	<div class="col-12">
		<nav>
			<ul class="pagination">
				<?= $this->pagination->create_links(); ?>
			</ul>
		</nav>
	</div>
</div>
<?php include 'footer.php';?>
