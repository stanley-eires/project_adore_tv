
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
<div class="page-header header-filter" filter-color="">
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/biggi1.jpg') ?>);background-color:#333;background-blend-mode:multiply"></div>
    <div class="content">
        <div class="container">
            <div class="col-md-4 mx-auto">
                <div class="card card-plain mt-5 text-center">
					<div class='card-header'>
						<h3 class="title font-weight-lighter">Password Recovery</h3>
					</div>
                    <form class="form" method="post" action="<?= base_url('home/password_reset');?>">
                        <div class="card-body">
                            <div class="input-group no-border input-lg ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white"><i class="now-ui-icons users_circle-08"></i></span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control text-white" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-round btn-block">Recover</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>