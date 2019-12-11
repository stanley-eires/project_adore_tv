<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand " href="#"><?= $page_title;?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <?php
                    $user_id	=	$this->session->userdata('user_id');
                    $user_detail = $this->db->get_where('user',array('user_id'=>$user_id))->row();
                ?>
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_single-02"></i>
                  <p><span class="d-lg-none d-md-block"><?= $user_detail->name;?></span></p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url('browse/');?>"> <i class="mdi mdi-arrow-top-right"></i> View Frontend</a>
                  <a class="dropdown-item" href="<?= base_url('admin/account');?>"><i class="mdi mdi-account-circle"></i> My Account</a>
                  <a class="dropdown-item" href="<?= base_url('home/signout');?>"><i class="mdi mdi-logout"></i> Logout</a>
                </div>
              </li>
            </ul>
        </div>
    </div>
</nav>