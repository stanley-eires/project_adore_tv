
<!-- TOP HEADING SECTION -->
<?php 
    $nav_type = '';

    if($page_name == 'dynamic_page' || $page_name == 'faq'){
        $nav_type = 'sticky-top';
    }else{
        $nav_type = 'fixed-top';
    }

?> 
<nav class="navbar navbar-expand-lg <?= $nav_type?>" style='background-color:rgba(0,0,0,0.4)'>
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="<?= base_url('browse');?>"><img  src="<?= base_url('assets/img/NEW2.png');?>" alt="adoreTv.png" width="70px"></a>
            <button type="button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto" id='navbar-center'>
                <li class="nav-item"><a class='nav-link' href="<?= base_url('browse');?>">Home</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movie</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php
                            $genres	= $this->db->get('genre')->result();
                            foreach ($genres as $_genre){
                                $total_content = $this->db->get_where('movie',['genre_id'=>$_genre->genre_id])->num_rows();
                                if($total_content > 0){
                            ?>

                            <a class="dropdown-item" href="<?= base_url('browse/movie/');?><?= $_genre->genre_id;?>"><?= $_genre->name ?> 
                                <span class="badge bg-primary float-right" ><?= $total_content?></span>
                            </a>
                            <?php 
                                }
                        }?>
                            
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link  dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tv Series</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php
                            $genres	= $this->db->get('genre')->result();
                            foreach ($genres as $_genre){
                                $total_content = $this->db->get_where('series',['genre_id'=>$_genre->genre_id])->num_rows();
                                if($total_content > 0){
                            ?>

                            <a class="dropdown-item" href="<?= base_url('browse/series/');?><?= $_genre->genre_id;?>"><?= $_genre->name ?> 
                                <span class="badge bg-primary float-right" ><?= $total_content?></span>
                            </a>
                            <?php 
                                }
                        }?>

                    </div>
                </li>
                <li class="nav-item mr-md-5">
                    <a class="nav-link" href="<?= base_url('browse/mylist');?>">My List </a>
                </li>
                <?php
                    // by default, email & general thumb shown at top
                    $bar_text	=	$this->user_model->get_current_user_detail('email');
                    $bar_thumb	=	'thumb1.png';
                    
                    // check if there is active subscription
                    $subscription_validation	=	$VALID_SUBSCRIPTION ;
                    if ($subscription_validation != false){
                        // if there is active subscription, check the selected/active user of current user account
                    
                        $active_user	=	$this->session->userdata('active_user');
                        if ($active_user == 'user1'){
                            $bar_text 	=	$this->user_model->get_current_user_detail('user1');
                            $bar_thumb	=	'thumb1.png';
                        }else if ($active_user == 'user2'){
                            $bar_text 	=	$this->user_model->get_current_user_detail('user2');
                            $bar_thumb	=	'thumb2.png';
                        }else if ($active_user == 'user3'){
                            $bar_text 	=	$this->user_model->get_current_user_detail('user3');
                            $bar_thumb	=	'thumb3.png';
                        }
                        else if ($active_user == 'user4'){
                            $bar_text 	=	$this->user_model->get_current_user_detail('user4');
                            $bar_thumb	=	'thumb4.png';
                        }
                    }
                ?>

                <form  id='search' class='ml-md-5' method="post" action="<?= base_url('browse/search');?>">
                    <div class="input-group no-border">
                        <input type="search" name="search_key" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="now-ui-icons ui-1_zoom-bold" onclick="$('#search').submit()"></i>
                        </div>
                        </div>
                    </div>
                </form>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('assets/global/').$bar_thumb;?>" style="height:30px; border-radius: 50%;" /> <?= $bar_text;?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php 
                            // user list shown only if there is active subscription 
                            if ($subscription_validation != false):
                                $current_plan_id	=	$this->subscription_model->get_current_plan_id();
                        ?>
                        <a href="<?= base_url('browse/doswitch/user1');?>" class='dropdown-item'>
                            <img src="<?= base_url('assets/global/thumb1.png');?>" style="height:30px;border-radius: 50%;" />
                            <?=  $this->user_model->get_current_user_detail('user1');?>
                        </a>
                        <?php if ($current_plan_id == 2 ||$current_plan_id == 3):?>
                        <a href="<?= base_url('browse/doswitch/user2');?>" class='dropdown-item'>
                            <img src="<?= base_url('assets/global/thumb2.png');?>" style="height:30px;border-radius: 50%;" />
                            <?=  $this->user_model->get_current_user_detail('user2');?>
                        </a>
                        <?php endif;?>
                        <?php if ($current_plan_id == 3):?>
                        <a href="<?= base_url('browse/doswitch/user3');?>" class='dropdown-item'>
                            <img src="<?= base_url('assets/global/thumb3.png');?>" style="height:30px;border-radius: 50%;" />
                            <?=  $this->user_model->get_current_user_detail('user3');?>
                        </a>
                        <a href="<?= base_url('browse/doswitch/user4');?>" class='dropdown-item'>
                            <img src="<?= base_url('assets/global/thumb4.png');?>" style="height:30px;border-radius: 50%;" />
                            <?=  $this->user_model->get_current_user_detail('user4');?>
                        </a>
                        <?php endif;?>
                        <?php endif;?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('browse/manageprofile');?>">Manage Profiles</a>
                        <div class="divider"></div>
                        <!-- SHOW ADMIN LINK IF ADMIN LOGGED IN -->
                        <?php if($this->session->userdata('login_type') == 1){?>
                        <a class="dropdown-item" href="<?= base_url('admin/dashboard') ?>">Admin</a>
                        <?php } ?>
                        <a class="dropdown-item" href="<?= base_url('browse/youraccount') ?>">Your Account</a>
                        <a class="dropdown-item" href="<?= base_url('home/signout') ?>">Sign Out</a>
                        
                    </div>
                </li>
                
            </ul>
            
        </div>    
    </div>
</nav>
<?php 
	if ($page_name == 'home' || $page_name == 'playmovie' || $page_name == 'playseries')
		$margin = 'mt-0';
	else
		$margin = 'mt-5';
	?>
<div class="<?php //echo $margin;?>"></div>