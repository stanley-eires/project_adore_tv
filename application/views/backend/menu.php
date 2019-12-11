<!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
    <div class="logo">
        <a href="<?= base_url('admin'); ?>" class="simple-text logo-normal">
            <img  src="<?= base_url('assets/img/NEW2.png');?>" alt="adoreTv.png" height="50px">
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="<?php if ($page_name == 'dashboard') echo 'active';?>">
                <a href="<?= base_url('admin/dashboard');?>">
                <i class="dripicons-meter"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'movie_list' || $page_name == 'movie_edit' || $page_name == 'movie_create')echo 'active';?>">
                <a href="<?= base_url('admin/movie_list');?>">
                    <i class="fa fa-video"></i>
                    <p>Movies</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'series_list' || $page_name == 'series_create' || $page_name == 'series_edit' || $page_name == 'season_edit')echo 'active';?>">
                <a href="<?= base_url('admin/series_list');?>">
                    <i class="fa fa-film"></i>
                    <p>TV Series</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'genre_list')echo 'active';?>">
                <a href="<?= base_url('admin/genre_list');?>">
                    <i class="fa fa-heartbeat"></i><p>Genre</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'director_list')echo 'active';?>">
                <a href="<?= base_url('admin/director_list');?>">
                    <i class=" dripicons-arrow-right"></i><p>Director</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'actor_list')echo 'active';?>">
                <a href="<?= base_url('admin/actor_list');?>">
                    <i class="mdi mdi-account-settings"></i><p>Actors</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'user_list')echo 'active';?>">
                <a href="<?= base_url('admin/user_list');?>">
                    <i class="mdi mdi-account-multiple"></i><p>Users</p>
                </a>
            </li>
            <li class="<?php if($page_name == 'faq_list') echo 'active'; ?>">
                <a href="<?= base_url('admin/faq_list');?>">
                    <i class="fa fa-question"></i><p>Customer FAQ</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'plan_list')echo 'active';?>">
                <a href="<?= base_url('admin/plan_list');?>">
                    <i class="mdi mdi-wallet-membership"></i><p>Membership Package</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'report')echo 'active';?>">
                <a href="<?= base_url('admin/report');?>">
                    <i class="dripicons-archive"></i><p>Report</p>
                </a>
            </li>
            <li class='dropdown-divider bg-secondary mx-3'></li>
            <li class="<?php if ($page_name == 'settings')echo 'active';?>">
                <a href="<?= base_url('admin/settings');?>">
                    <i class="mdi mdi-settings"></i><p>Website Settings</p>
                </a>
            </li>
            <li class="<?php if ($page_name == 'payment_settings')echo 'active';?>">
                <a href="<?= base_url('admin/payment_settings');?>">
                    <i class="mdi mdi-credit-card"></i><p>Currency / Payment Settings</p>
                </a>
            </li>
            
        </ul>
    </div>