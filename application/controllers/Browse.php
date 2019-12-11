<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->login_check();
	}

	function index(){
		$this->subscription_check();
		$this->active_user_check();
		$this->multi_device_access_check();
		$page_data['featured_movie'] = $this->movie_model->get_featured_movie();
		$page_data['page_name']		=	'home';
		$page_data['page_title']	=	'Home';
		$this->load->view('frontend/index', $page_data);
	}

	function switchprofile(){
		$this->subscription_check();
		$page_data['page_name']	= 'switchprofile';
		$page_data['page_title'] = 'Switch Profile';
		$page_data['current_plan_id'] = $this->subscription_model->get_current_plan_id();
		$this->load->view('frontend/index', $page_data);
	}
	
	function manageprofile(){
		$this->subscription_check();
		$page_data['page_name']			=	'manageprofile';
		$page_data['page_title']		=	'Manage Profile';
		$page_data['current_plan_id']	=	$this->subscription_model->get_current_plan_id();
		$this->load->view('frontend/index', $page_data);

	}

	function editprofile($user = ''){
		$this->subscription_check();
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->db->update('user', [$user => $this->input->post('username')], ['user_id' => $this->session->userdata('user_id')]);
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','User Profile Changed')</script>");
			redirect(base_url('browse/manageprofile') , 'refresh');
		}
		$page_data['page_name']			=	'editprofile';
		$page_data['page_title']		=	'Edit Profile';
		$page_data['user']				=	$user;
		$this->load->view('frontend/index', $page_data);

	}

	function doswitch($user_number){
		$this->subscription_check();
		$this->subscription_model->activate_user_session($user_number);
		redirect(base_url('browse') , 'refresh');
	}

	function youraccount(){
		$page_data['page_name']		=	'youraccount';
		$page_data['page_title']	=	'Your Account';
		$this->load->view('frontend/index', $page_data);
	}

	function emailchange(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			if($this->user_model->change_user_email()){
				redirect(base_url('browse/youraccount'));
			}else{
				redirect(base_url('browse/emailchange'));
			}
		}
		$page_data['page_name']			=	'emailchange';
		$page_data['page_title']		=	'Change email address';
		$this->load->view('frontend/index', $page_data);

	}

	function passwordchange(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			if($this->user_model->change_user_password()){
				redirect(base_url('browse/youraccount'));
			}else{
				redirect(base_url('browse/passwordchange'));
			}
			
		}
		$page_data['page_name']			=	'passwordchange';
		$page_data['page_title']		=	'Change Password';
		$this->load->view('frontend/index', $page_data);

	}



	function search(){
		$this->subscription_check();
		$search_result = [];
		$search_key = "";
		$per_page = 56;
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$search_key = $this->input->post('search_key');
			$search_result = $this->movie_model->get_search_result($search_key,$per_page, $this->uri->segment(4));			
		}
		$url = base_url() . 'browse/search/';
		
		$total_result = count($search_result) ;
		$config = $this->crud_model->paginate($url, $total_result,$per_page);
        $this->pagination->initialize($config);
		
		$page_data['page_name']		=	'search';
		$page_data['search_result']	=	$search_result;
		$page_data['search_key']	=	$search_key;
		$page_data['page_title']	=	'Search result';
		$this->load->view('frontend/index', $page_data); 

	}

	function process_list($type = '', $task = '', $id = ''){
		$this->movie_model->update_my_list($type,$task,$id);	
	}

	function movie($genre_id = '', $offset = ''){
		$this->subscription_check();
		$page_data['page_name']		=	'movie';
		$page_data['page_title']	=	'Watch Movie';
		$page_data['genre_id']	=	$genre_id;

		// pagination configuration
		$url = base_url() . 'browse/movie/' . $genre_id;
        $per_page = 18;
		$this->db->where('genre_id' , $genre_id);
        $total_result = $this->db->count_all_results('movie');
        $config = $this->crud_model->paginate($url, $total_result, $per_page);
        $this->pagination->initialize($config);

        $page_data['movies'] = $this->movie_model->get_movies($genre_id , $per_page, $this->uri->segment(4));
		$page_data['total_result']	=	$total_result;

		$this->load->view('frontend/index', $page_data);
	}

	function mylist(){
		$this->subscription_check();
		$page_data['page_name']		=	'mylist';
		$page_data['page_title']	=	'My List';
		$this->load->view('frontend/index', $page_data);
	}

	function series($genre_id = '', $offset = ''){
		$this->subscription_check();
		$page_data['page_name']		=	'series';
		$page_data['page_title']	=	'Watch Tv Series';
		$page_data['genre_id']	=	$genre_id;

		// pagination configuration
		$url = base_url() . 'browse/series/' . $genre_id;
        $per_page = 18;
		$this->db->where('genre_id' , $genre_id);
        $total_result = $this->db->count_all_results('series');
        $config = $this->crud_model->paginate($url, $total_result, $per_page, 4);
        $this->pagination->initialize($config);

        $page_data['series'] = $this->movie_model->get_series($genre_id , $per_page, $this->uri->segment(4));
		$page_data['total_result']	=	$total_result;

		$this->load->view('frontend/index', $page_data);
	}

	function playmovie($movie_id){
		$this->subscription_check();
        $this->active_user_check();
        $this->multi_device_access_check();
		$page_data['page_name']		=	'playmovie';
		$page_data['page_title']	=	'Watch Movie';
		$page_data['movie_details'] = $this->movie_model->get_movie($movie_id);
		$this->load->view('frontend/index', $page_data);
	}

	function playseries($series_id = '', $season_id = '', $episode_id = ""){
		$this->subscription_check();
        $this->active_user_check();
        $this->multi_device_access_check();
		if ($season_id == ''){
        	$seasons	=	$this->db->get_where('season', array('series_id'=>$series_id))->result_array();
			foreach ($seasons as $row)
			{
				$first_season_id	=	$row['season_id'];
				break;
			}
			$page_data['season_id']		=	$first_season_id;
		}
		else
			$page_data['season_id']		=	$season_id;

		if ($episode_id == "") {
			$page_data['episode']		= $this->db->get_where('episode', array('season_id'=>$page_data['season_id']))->row();

		}else
			$page_data['episode_id']		= $episode_id;

		$page_data['series_id']		=	$series_id;
		$page_data['page_name']		=	'playseries';
		$page_data['page_title']	=	'Watch Tv Series';
		$this->load->view('frontend/index', $page_data);
	}

	function cancelplan(){
		if (isset($_POST) && !empty($_POST)){
			$subscription_id = $this->subscription_model->validate_subscription();
			if($subscription_id == false){
				redirect(base_url('browse/youraccount'), 'refresh');
			}
			$this->db->update('subscription', array('status' => 0), array('subscription_id' => $subscription_id));
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Subscription Cancelled Successful')</script>");
			redirect(base_url('browse/youraccount'), 'refresh');
		}
		$page_data['page_name']			=	'cancelplan';
		$page_data['page_title']		=	'Cancel Plan';
		$this->load->view('frontend/index', $page_data);

	}

	function purchaseplan(){
		if (isset($_POST) && !empty($_POST)){

			redirect(base_url().'browse/youraccount' , 'refresh');
		}
		$page_data['page_name']			=	'purchaseplan';
		$page_data['page_title']		=	'Purchase Package';
		$this->load->view('frontend/index', $page_data);

	}

	function billinghistory(){
		$page_data['page_name']		=	'billinghistory';
		$page_data['page_title']	=	'Billing History';
		$this->load->view('frontend/index', $page_data);
	}

	function report_invoice($param1 = '', $param2 = ''){
		$page_data['page_name']	= 'report_invoice';
		$page_data['subscription_id'] = $param1;
		$page_data['user_id']	  = $param2;
		$page_data['page_title']=	'Subscription & payment invoice';
		$this->load->view('frontend/index', $page_data);
	}

	// CHECK IF LOGGED IN USER ACCOUNT HAS SELECTED ANY OF HIS PROFILE(S), MUST BE CHECKED AFTER SUBSCRIPTION CHECK
	function active_user_check(){
		// admin can access all frontend pages
// 		if ($this->session->userdata('login_type') == 1)
// 			return;

		$active_user	=	$this->session->userdata('active_user');
		if ($active_user == ''){
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Please select a user')</script>");
			redirect(base_url().'browse/switchprofile');
		}
			
	}

	// CHECK IF LOGGED IN USER HAS ACTIVE SUBSCRIPTION, IF NOT THEN REDIRECT TO ACCOUNT MANAGING PAGE
	function subscription_check(){
		// admin can access all frontend pages
		if ($this->session->userdata('login_type') == 1)
			return;

		$subscription_validation	=	$this->subscription_model->validate_subscription();
		if ($subscription_validation == false){
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','warning','Restricted','You currently dont have a subscription plan. Please Purchase one')</script>");
			redirect(base_url('browse/youraccount'), 'refresh');
		}
	}

	function login_check(){
		if ($this->session->userdata('user_login_status') != 1){
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','warning','Authentication Required','Please log into your account to access page content ')</script>");
			$requset_uri = uri_string();
			redirect(base_url('home/signin')."?redirect=$requset_uri", 'refresh');
		}
			
	}

	function multi_device_access_check(){
		// admin can access all frontend pages
		if ($this->session->userdata('login_type') == 1)
			return;

		// checking the same profile trying to access multiple devices/sessions
		$logged_in_user_id			=	$this->session->userdata('user_id');
		$active_user_session 		=	$this->session->userdata('active_user').'_session';
		$user_entering_db_timestamp	=	$this->db->get_where('user', ['user_id' => $logged_in_user_id])->row()->$active_user_session;

		$user_entering_timestamp	=	$this->session->userdata('user_entering_timestamp');

		if ($user_entering_timestamp != $user_entering_db_timestamp){
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','warning','Already Activated','User Profile is currently active on another device. Log off from all devices or choose another profile')</script>");
			redirect(base_url('browse/switchprofile'));
		}
			
	}

	public function payment_success_paystack($method = "", $plan_id = "", $reference = "") {

		if(!$reference){
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Transaction Failed','Your transaction has no reference code.')</script>");
			redirect(base_url('browse/purchaseplan'));
		}
		$payment_response = $this->payment_model->process_payment($reference,$plan_id);
		if($payment_response == false){
			redirect(base_url('browse/purchaseplan'));
		}else{
			$this->doswitch('user1');
		}
	
	}


}
