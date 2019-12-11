
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	<div class="container">
		<div class="navbar-wrapper">
		<a class="navbar-brand" href="<?= base_url();?>" ><img src="<?= base_url('assets/img/NEW2.png');?>" alt="adoreTv.png" style="width:70px"></a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-bar bar1"></span>
		<span class="navbar-toggler-bar bar2"></span>
		<span class="navbar-toggler-bar bar3"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navigation">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="<?= base_url('home/signup');?>" class="nav-link btn btn-sm btn-light">Start Watching
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link btn btn-sm btn-primary" href="<?= base_url('home/signin')?>"><i class=""></i>Sign In
				</a>
			</li>
		</ul>
		</div>
	</div>
</nav>
<div class=" page-header clear-filter" filter-color="white" style='display:flex;align-items:center;justify-content:flex-start'>
	<div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/landing_banner.jpg');">
	</div>
	<div class="container">
		<div class="col-md-7">
			<div class="brand">
				<h1 class="title">Exclusive Movies</h1>
				<h3 class="description">Thousands of Exclusive movies and series. On the go on all devices.</h3>
				<br/>
				<a href="<?= base_url('home/signup');?>" class="btn btn-primary btn-lg text-uppercase" >Start Watching</a>
			</div>
		</div>
	</div>

</div>

<div class="features-7 section-image py-1" style="background-image: url('assets/img/bg11.jpg')">
	<div class="col-md-8 mx-auto text-center">
		<h2 class="title text-capitalize">Mind blowing features</h2>
		<h4 class="description">We bring exclusive movies to your finger tips with our mouth-watering App features.</h4>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 px-0">
				<div class="col-sm-12">
					<div class="info info-horizontal">
						<div class="icon">
							<i class="now-ui-icons arrows-1_cloud-download-93"></i>
						</div>
						<div class="description">
							<h5 class="info-title">No Adverts</h5>
							<p class="description">We ensure that you never get to see any adverts on this platform so you can enjoy uninterrupted access to nollywood's best movies.</p>
						</div>
					</div>
					<div class="info info-horizontal">
						<div class="icon">
							<i class="now-ui-icons arrows-1_refresh-69"></i>
						</div>
						<div class="description">
							<h5 class="info-title">Offline Playback</h5>
							<p class="description">You get to save/download nollywood movies for offline playback.</p>
						</div>
					</div>
					<div class="info info-horizontal">
						<div class="icon">
							<i class="now-ui-icons arrows-1_share-66"></i>
						</div>
						<div class="description">
							<h5 class="info-title">Share with Friends</h5>
							<p class="description">You get to share downloaded nollywood movies with your friends wherever they are.</p>
						</div>
					</div>
				</div>

			</div>

			<div class="col-md-7">
				<div class="image-container"><img src="assets/img/features_.png" alt="">
				</div>
			</div>

		</div>
	</div>
</div> 
<div class="bg-light" id="blogs-2">
	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto text-center">
				<h2 class="title text-dark">Stream Anywhere</h2>   
				<h4 class="description">Watch TV Shows And Movies Anytime, Anywhere. From Any Device.</h4>
				<div class="row justify-content-center">
					<div class="col-md-4">
						<div class="card card-plain card-blog">
							<div class="card-image">
								<a href="#">
									<img class="img rounded" src="assets/img/tv.png">
								</a>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card card-plain card-blog">
							<div class="card-image">
								<a href="#">
									<img class="img rounded" src="assets/img/tablets_and_phone.png">
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-plain card-blog">
							<div class="card-image">
								<a href="#">
									<img class="img rounded" src="assets/img/pc.png">
								</a>
							</div>                         
						</div>
					</div>
					<div class=''>
						<a class="btn btn-primary btn-lg text-uppercase text-white">View Supported Devices</a>
					</div>
				</div>              
			</div>
		</div>
	</div>
</div>
<div class="section" style="background-image:url(assets/img/newarea.jpg);">
	<div class="row text-center text-white">
		<div class="col-md-6 mx-auto">
			<h2 class="title text-capitalize">Get an acccount today</h2>
			<h5 class="description text-white">Access contents on all of your devices, sync your queue and continue watching anywhere.</h5>
			<div>
				<a href="<?= base_url('home/signup');?>" class="btn btn-lg btn-light text-uppercase">Start Watching</a>
			</div>
		</div>
		
	</div>
</div>
<?php include 'footer.php';?>

<?php
    $pop_page = $this->db->get_where('pages', ['status'=>1,'popup'=>1])->row();
    if ($pop_page):?>
<!-- Modal -->
<div class="modal fade animated rotateInUpLeft" id="popup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg " role="document">
		<div class="modal-content bg-transparent shadow-none">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<?= $pop_page->content?>

		</div>
	</div>
</div>

<script>
setTimeout(() => {
$('#popup').modal('show')
}, 3000);
</script>

<?php endif ?>




