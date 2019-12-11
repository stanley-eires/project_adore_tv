<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/hover.css')?>" />
<style>




</style>
<?php include 'header_browse.php';?>
<!-- MOVIE LIST, GENRE WISE LISTING -->
<div class="page-header header-filter" filter-color="" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/biggi1.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
	<div class="container mt-md-5">
		<div class="row text-center no-gutters">
			<div class="col-12">
				<h4 class='text-capitalize display-4 text-left'>
					<?= $this->db->get_where('genre', ['genre_id' => $genre_id])->row()->name?>  Movies(<?= $total_result?>)
				</h4>	
			</div>
			
			
			<?php 
				foreach ($movies as $row){
					$title	=	$row->title;
					$link	=	base_url().'browse/playmovie/'.$row->movie_id;
					$thumb	=	$this->movie_model->get_thumb_url('movie' , $row->movie_id);
					echo "<div class='col-6 col-md-4'>";
					echo $this->slidercarousel::create_thumbnail($thumb,$title,$link,"assets/img/Play.png","w-100");
					echo "</div>";
				}
			?>
		</div>
		<div class="col-12">
			<nav>
				<ul class="pagination">
					<?= $this->pagination->create_links(); ?>
				</ul>
			</nav>
		</div>
		
	</div>

</div>
<?php include 'footer.php';?>
