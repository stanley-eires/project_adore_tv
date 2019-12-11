
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
<div class="page-header header-filter" filter-color="" >
    <div class="page-header-image" style="background-image:url(<?= base_url('assets/img/biggi1.jpg')?>);background-color:#333;background-blend-mode:multiply">
	</div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-plain text-center mt-5 mt-md-0">
						<div class='card-header'>
							<h3 class="title font-weight-lighter">Register</h3>
						</div>
                    	<div class="card-body text-white">
                        	<form class="form" method="POST" action="<?= base_url('home/signup')?>">
                            	<div class="input-group no-border input-lg ">
                                    <div class="input-group-prepend ">
                                        <div class="input-group-text text-white "><i class="now-ui-icons users_single-02"></i></div>
                                    </div>
                                    <input type="text"  name="name" id="fullname" class="form-control text-white" placeholder="Full Name" required >
                                    
                                </div>

                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white"><i class="now-ui-icons ui-1_email-85"></i></span>
                                    </div>
                                    <input type="text" name="email" id="email" class="form-control text-white" placeholder="Email" required>
                                </div>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white"><i class="now-ui-icons ui-1_lock-circle-open"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control text-white" placeholder="password" required minlength='6'>
                                </div>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white"><i class="now-ui-icons ui-1_lock-circle-open"></i></span>
                                    </div>
                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control text-white" placeholder="Password Confirmation" required minlength='6'>
                                </div>

                                <div class="form-check small text-left">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"  onchange="terms(this.checked)">
                                        <span class="form-check-sign"></span>
                                        I agree to the AdoreTv <a href="" style="color:#ff5d00">Terms of Use</a> and <a style="color:#ff5d00" href="" >Privacy Policy</a>.
                                    </label>
                                </div>
                                <!-- <div class="form-check small">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">
                                        <span class="form-check-sign"></span>
                                        Sign up for Newletters, updates from AdoreTV and promotions. Unsubscribe at any time.
                                    </label>
                                </div> -->

                                <div class="card-footer text-center">
                                    <button type="submit" name="submit" id='submit' class="btn btn-round btn-block btn-primary" disabled>Sign Up</button>
                                </div>
                                <script>
                                    const terms = (bool) =>{
                                        bool?document.querySelector('#submit').removeAttribute('disabled'):document.querySelector('#submit').setAttribute('disabled','disabled');
                                    }
                                </script>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
