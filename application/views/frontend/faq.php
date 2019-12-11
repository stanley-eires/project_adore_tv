<style>
#accordion .card-header button:after {
  font-family: 'FontAwesome';
  content: "#";
  font-size:1.5em;
  float: right;
}
</style> 
<?php if($this->session->userdata('user_login_status') == 1){
	include 'header_browse.php';
}else{
?>

<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary sticky-top">
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
	<?php }?>
<div class="" style='display:flex;justify-content:flex-start;min-height:80vh'>
	<div class="container">
		<div class="row" >
			<div class="col-12 col-lg-10 mx-auto">
			<h2>Frequently Asked Questions</h2>
				<div id="accordion">
					<?php foreach($faq as $_faq):?>
					<div class="card card-plains shadow-none">
						<div class="card-header" id="headingOne">
							<button class="btn btn-primary btn-lg w-100 text-left m-0" data-toggle="collapse" data-target="#collapse<?=$_faq->faq_id ?>" aria-expanded="true" aria-controls="collapseOne">
								<?=strtoupper($_faq->question) ?>
							</button>
						</div>
						<div id="collapse<?=$_faq->faq_id ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body text-dark">
								<?=$_faq->answer ?>
							</div>
						</div>
					</div>	
					<?php endforeach ?>
				</div>

			</div>
		
		</div>
	</div>
</div>
<div>
	<?php include 'footer.php';?>
</div>

