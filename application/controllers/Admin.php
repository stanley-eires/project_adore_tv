<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	// constructor
	function __construct()
	{
		parent::__construct();
		$this->admin_login_check();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->dashboard();
	}

	function dashboard() 
	{
		$page_data['page_name']		=	'dashboard';
		$page_data['page_title']	=	'Home - Summary';
		$this->load->view('backend/index', $page_data);
	}

	// WATCH LIST OF GENRE, MANAGE THEM
	function genre_list(){
		$page_data['page_name']		=	'genre_list';
		$page_data['genres']		=	$this->movie_model->get_genre();
		$page_data['page_title']	=	'Manage Genre';
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW GENRE
	function genre_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->db->insert('genre', ['name'=>ucfirst($this->input->post('name'))]);
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Genre created')</script>");
		}
		redirect(base_url().'admin/genre_list');
	}

	// EDIT A GENRE
	function genre_edit($genre_id = ''){
		if($genre_id == ''){redirect(base_url().'admin/genre_list' , 'refresh');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->db->update('genre', ['name'=>ucfirst($this->input->post('name'))],  array('genre_id' => $genre_id));
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Genre updated')</script>");
		}
		redirect(base_url().'admin/genre_list');
	}

	// DELETE A GENRE
	function genre_delete($genre_id = ''){
		if($genre_id == ''){redirect(base_url().'admin/genre_list' , 'refresh');}
		$this->db->delete('genre',  array('genre_id' => $genre_id));
		redirect(base_url().'admin/genre_list' , 'refresh');
	}

	// WATCH LIST OF MOVIES, MANAGE THEM
	function movie_list(){
		$page_data['movies']		=	$this->movie_model->get_movies();
		$page_data['page_name']		=	'movie_list';
		$page_data['page_title']	=	'Manage movie';
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW MOVIE
	function movie_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$movie_id = $this->movie_model->create_movie();
			if($movie_id == false){
				redirect(base_url().'admin/movie_create' , 'refresh');	
			}
			redirect(base_url().'admin/movie_edit/'.$movie_id);	
		}
		$page_data['page_name']		=	'movie_create';
		$page_data['page_title']	=	'Create movie';
		$this->load->view('backend/index', $page_data);
	}

	// EDIT A MOVIE
	function movie_edit($movie_id = ''){
		if($movie_id == ''){redirect(base_url().'admin/movie_list' , 'refresh');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->movie_model->update_movie($movie_id);
			redirect(base_url().'admin/movie_edit/'.$movie_id);
		}
		$page_data['movie_id']		=	$movie_id;
		$page_data['movie_detail']	=	$this->movie_model->get_movie($movie_id);
		$page_data['page_name']		=	'movie_edit';
		$page_data['page_title']	=	'Edit movie';
		$this->load->view('backend/index', $page_data);
	}

	// DELETE A MOVIE
	function movie_delete($movie_id = ''){
		if($movie_id == ''){redirect(base_url().'admin/movie_list');}
		$this->movie_model->delete_movie($movie_id);
		redirect(base_url().'admin/movie_list');
	}

	// WATCH LIST OF SERIESS, MANAGE THEM
	function series_list()
	{
		$page_data['page_name']		=	'series_list';
		$page_data['page_title']	=	'Manage Tv Series';
		$page_data['series']	=	$this->movie_model->get_series();
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW SERIES
	function series_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){

			if($this->crud_model->check_if_exists('series','title',$this->input->post('title'))){
				$this->movie_model->create_series();
				redirect(base_url().'admin/series_list');
			}else{
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','','Series with that title already exists')</script>");
			}
		}
		$page_data['page_name']		=	'series_create';
		$page_data['page_title']	=	'Create Tv Series';
		$this->load->view('backend/index', $page_data);
	}

	// EDIT A SERIES
	function series_edit($series_id = ''){
		if($series_id == ''){redirect(base_url().'admin/series_list' , 'refresh');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->movie_model->update_series($series_id);
			redirect(base_url().'admin/series_edit/'.$series_id);
		}
		$page_data['series_id']		=	$series_id;
		$page_data['page_name']		=	'series_edit';
		$page_data['series_details']		=	$this->db->get_where('series', ['series_id'=>$series_id])->row();
		$page_data['page_title']	=	'Edit Tv Series. Manage Seasons & Episodes';
		$this->load->view('backend/index', $page_data);
	}

	// DELETE A SERIES
	function series_delete($series_id = '')
	{
		$this->db->delete('series',  array('series_id' => $series_id));
		redirect(base_url().'admin/series_list');
	}

	// CREATE A NEW SEASON
	function season_create($series_id = '')
	{
		$this->db->where('series_id' , $series_id);
		$this->db->from('season');
        $number_of_season 	=	$this->db->count_all_results();

		$data['series_id']	=	$series_id;
		$data['name']		=	'Season ' . ($number_of_season + 1);
		$this->db->insert('season', $data);
		redirect(base_url().'admin/series_edit/'.$series_id);
	}

	// EDIT A SEASON
	function season_edit($series_id = '', $season_id = '')
	{
		if (isset($_POST) && !empty($_POST))
		{
			$data['title']			=	$this->input->post('title');
			$this->db->update('series', $data,  array('series_id' => $series_id));
			redirect(base_url().'admin/series_edit/'.$series_id , 'refresh');
		}
		$series_name				=	$this->db->get_where('series', array('series_id'=>$series_id))->row()->title;
		$season_name				=	$this->db->get_where('season', array('season_id'=>$season_id))->row()->name;
		$page_data['page_title']	=	'Manage episodes of ' . $season_name . ' : ' . $series_name;
		$page_data['season_name']	=	$this->db->get_where('season', array('season_id'=>$season_id))->row()->name;
		$page_data['series_id']		=	$series_id;
		$page_data['season_id']		=	$season_id;
		$page_data['page_name']		=	'season_edit';
		$this->load->view('backend/index', $page_data);
	}

	// DELETE A SEASON
	function season_delete($series_id = '', $season_id = '')
	{
		$this->db->delete('season',  array('season_id' => $season_id));
		redirect(base_url().'admin/series_edit/'.$series_id , 'refresh');
	}

	// CREATE A NEW EPISODE
	function episode_create($series_id = '', $season_id = '')
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->movie_model->create_episode($season_id);
			redirect(base_url().'admin/season_edit/'.$series_id.'/'.$season_id , 'refresh');
		}
	}

	// CREATE A NEW EPISODE
	function episode_edit($series_id = '', $season_id = '', $episode_id = '')
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->movie_model->update_episode($episode_id,$season_id,$series_id);	
			redirect(base_url().'admin/season_edit/'.$series_id.'/'.$season_id , 'refresh');
		}
	}

	// DELETE AN EPISODE
	function episode_delete($series_id = '', $season_id = '', $episode_id = '')
	{
		$this->db->delete('episode',  array('episode_id' => $episode_id));
		redirect(base_url().'admin/season_edit/'.$series_id.'/'.$season_id , 'refresh');
	}

	// WATCH LIST OF ACTORS, MANAGE THEM
	function actor_list(){
		$page_data['page_name']		=	'actor_list';
		$page_data['page_title']	=	'Manage actor';
		$page_data['actors']		=	$this->movie_model->get_actor();
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW ACTOR
	function actor_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->movie_model->create_actor();
			redirect(base_url().'admin/actor_list' , 'refresh');
		}
		
	}

	// EDIT A ACTOR
	function actor_edit($actor_id = ''){
		if($actor_id == ''){redirect(base_url().'admin/actor_list' , 'refresh');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->movie_model->update_actor($actor_id);
			redirect(base_url().'admin/actor_list' , 'refresh');
		}
	}

	// DELETE A ACTOR
	function actor_delete($actor_id = '')
	{
		if($actor_id == ''){redirect(base_url().'admin/actor_list');}
		$this->movie_model->delete_actor($actor_id);
		redirect(base_url().'admin/actor_list');
	}

	function actor_wise_movie_and_series($actor_id) {
		$page_data['page_name']				=	'actor_wise_movie_and_series';
		$page_data['page_title']			=	('Movies and TV series of').' "'.$this->movie_model->get_actor($actor_id,'name').'"';
		$page_data['actor_id']				=	$actor_id;


		$this->load->view('backend/index', $page_data);
	}

	// WATCH LIST OF DIRECTOR, MANAGE THEM
	function director_list(){
		$page_data['page_name']		=	'director_list';
		$page_data['directors']		=	$this->movie_model->get_director();
		$page_data['page_title']	=	'Manage Director';
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW DIRECTOR
	function director_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->movie_model->create_director();
			redirect(base_url().'admin/director_list' , 'refresh');
		}
	}

	// EDIT A DIRECTOR
	function director_edit($director_id = ''){
		if($director_id == ''){redirect(base_url().'admin/director_list' , 'refresh');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->movie_model->update_director($director_id);
			redirect(base_url().'admin/director_list' , 'refresh');
		}
	}

	// DELETE A DIRECTOR
	function director_delete($director_id = ''){
		if($director_id == ''){redirect(base_url().'admin/director_list');}
		$this->movie_model->delete_director($director_id);
		redirect(base_url().'admin/director_list');
	}

	function director_wise_movie_and_series($director_id) {
		$page_data['page_name'] =	'director_wise_movie_and_series';
		$page_data['page_title'] =	'Movies And TV series of'.' "'.$this->movie_model->get_director($director_id,'name').'"';
		$page_data['movies']	=	$this->db->get_where('movie', ['director' => $director_id])->result_array();
		$page_data['series']	=	$this->db->get_where('series', ['director' => $director_id])->result_array();

		$this->load->view('backend/index', $page_data);
	}


	// WATCH LIST OF PRICING PACKAGES, MANAGE THEM
	function plan_list()
	{
		$page_data['page_name']		=	'plan_list';
		$page_data['plans']	=	$this->db->get('plan')->result_array();
		$page_data['page_title']	=	'Manage plan';
		$this->load->view('backend/index', $page_data);
	}

	function plan_edit($plan_id = ''){
		if($plan_id == ''){redirect(base_url().'admin/plan_list');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			if($this->db->update('plan', $_POST,  array('plan_id' => $plan_id))){
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Plan Updated')</script>");
			}	
			redirect(base_url().'admin/plan_list' , 'refresh');
		}
	}

	// WATCH LIST OF USERS, MANAGE THEM
	function user_list()
	{
		$page_data['page_name']		=	'user_list';
		$page_data['page_title']	=	'Manage user';
		$page_data['users']		=	$this->user_model->get_users();
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW USER
	function user_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
            if ($this->db->get_where('user', ['email'=>$this->input->post('email')])->num_rows() > 0) {
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','','Email already exists')</script>");
            }else{
				$data['name'] = ucwords($this->input->post('name'));
				$data['email'] = strtolower($this->input->post('email'));
				$data['password'] = sha1($this->input->post('password'));
				$data['type'] = 1;
				$data['verified'] = 1;
				$data['user_id'] = mt_rand(1000000000, 2000000000);
				$this->db->insert('user' , $data);
				$this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','User created')</script>");
			}	
			redirect(base_url().'admin/user_list');
		}
	}

	// EDIT A USER
	function user_edit($edit_user_id = ''){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data['name']				=	ucwords($this->input->post('name'));
			$data['email']				=	strtolower($this->input->post('email'));
			$this->db->update('user', $data, array('user_id'=>$edit_user_id));
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','User Updated')</script>");
		}
		redirect(base_url().'admin/user_list');
	}

	// DELETE A USER
	function user_delete($user_id = '')
	{
		$this->db->delete('user',  array('user_id' => $user_id));
		redirect(base_url().'admin/user_list' , 'refresh');
	}
	function user_operation($user_id = '',$action=''){
		if($action == 'ban'){
			$this->db->update('user', ['status'=>0], ['user_id'=>$user_id]);
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','User banned')</script>");
		}elseif($action == 'unban'){
			$this->db->update('user', ['status'=>1], ['user_id'=>$user_id]);
			$this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','User unbanned')</script>");
		}
		redirect(base_url().'admin/user_list', 'refresh');
	}


	// WATCH SUBSCRIPTION, PAYMENT REPORT
	function report($month = '', $year = '')
	{
		if ($month == '')
			$month	=	date("F");
		if ($year == '')
			$year = date("Y");

		$page_data['month']			=	$month;
		$page_data['year']			=	$year;
		$page_data['page_name']		=	'report';
		$page_data['page_title']	=	'Customer subscription & payment report';
		$this->load->view('backend/index', $page_data);
	}

	// WATCH LIST OF FAQS, MANAGE THEM
	function faq_list()
	{
		$page_data['page_name']		=	'faq_list';
		$page_data['page_title']	=	'Manage FAQ';
		$page_data['faqs']	=	$this->crud_model->get_faq();
		$this->load->view('backend/index', $page_data);
	}

	// CREATE A NEW FAQ
	function faq_create(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data['question']		=	$this->input->post('question');
			$data['answer']			=	$this->input->post('answer');
			if($this->db->insert('faq', $data)){
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','FAQ Created')</script>");
			}
			redirect(base_url().'admin/faq_list' , 'refresh');
		}

	}

	// EDIT A FAQ
	function faq_edit($faq_id = ''){
		if($faq_id == ''){redirect(base_url().'admin/faq_list');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data['question']		=	$this->input->post('question');
			$data['answer']			=	$this->input->post('answer');
			if($this->db->update('faq', $data,  array('faq_id' => $faq_id))){
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','FAQ Updated')</script>");
			}else{
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','','FAQ Updated failed')</script>");
			}
			redirect(base_url().'admin/faq_list' , 'refresh');
		}
	}

	// DELETE A FAQ
	function faq_delete($faq_id = ''){
		if($faq_id == ''){redirect(base_url().'admin/faq_list');}
		$this->db->delete('faq',  array('faq_id' => $faq_id));
		redirect(base_url().'admin/faq_list');
	}

	// EDIT SETTINGS
	function settings(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			foreach ($_POST as $key => $value) {
				$this->db->update('settings',['description'=>$value],['type'=>$key]);
			}
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Settings Updated')</script>");
			redirect(base_url().'admin/settings');

		}
		$page_data['page_name']				=	'settings';
		$page_data['page_title']			=	'Website settings';
		$this->load->view('backend/index', $page_data);
	}

	function create_page(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->crud_model->create_page();
		}
		redirect(base_url().'admin/settings');

	}
	function edit_page($page_id){
		if($page_id == ''){redirect(base_url().'admin/settings');}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			if($this->db->update('pages',$this->input->post(),['id'=>$page_id])){
				$this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Page Updated')</script>");
			}

		}
		redirect(base_url().'admin/settings');

	}

	function payment_settings($param1 = "") {

		if ($param1 == 'system_currency') {
			$this->crud_model->system_currency();
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Currency Updated')</script>");
            redirect(base_url('admin/payment_settings'), 'refresh');
        }

        if ($param1 == 'paystack') {
			$this->crud_model->update_paystack_keys();
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Paystack gateway updated')</script>");
            redirect(base_url('admin/payment_settings'), 'refresh');
        }

        if ($param1 == 'interswitch') {
			$this->crud_model->update_interswitch_keys();
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Interswitch gateway updated')</script>");
            redirect(base_url('admin/payment_settings'), 'refresh');
        }
        $page_data['page_name'] = 'payment_settings';
        $page_data['page_title'] = ('payment settings');
        $this->load->view('backend/index', $page_data);
    }

	function report_invoice($param1 = '', $param2 = ''){
		$page_data['subscription_id'] = $param1;
		$page_data['user_id'] = $param2;
		$page_data['page_title']			=	'Customer subscription & payment invoice';
		$this->load->view('backend/pages/report_invoice', $page_data);
	}

	function manage_language($param1 = '', $param2 = '', $param3 = '')
	{

		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] = $param2;
		}
		if ($param1 == 'update_phrase') {
			$language = $param2;
			$total_phrase = $this->input->post('total_phrase');
			for ($i = 1; $i < $total_phrase; $i++) {
				//$data[$language]  =   $this->input->post('phrase').$i;
				$this->db->where('phrase_id', $i);
				$this->db->update('language', array($language => $this->input->post('phrase' . $i)));
			}
			redirect(base_url() . 'admin/manage_language/edit_phrase/' . $language, 'refresh');
		}
		if ($param1 == 'do_update') {
			$language = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', ('settings_updated'));
			redirect(base_url() . 'admin/manage_language/', 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', ('settings_updated'));
			redirect(base_url() . 'admin/manage_language/', 'refresh');
		}
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT',
					'null' => FALSE
				)
			);
			$this->dbforge->add_column('language', $fields);

			$this->session->set_flashdata('flash_message', ('settings_updated'));
			redirect(base_url() . 'admin/manage_language/', 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', ('settings_updated'));

			redirect(base_url() . 'admin/manage_language/', 'refresh');
		}

		$page_data['page_name']				=	'manage_language';
		$page_data['page_title']			=	'Multi - language settings';
		$this->load->view('backend/index', $page_data);
	}

	function account(){
		$user_id	=	$this->session->userdata('user_id');

		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$task	=	$this->input->post('task');
			if ($task == 'update_profile'){
				$data['name']				=	$this->input->post('name');
				$data['email']				=	$this->input->post('email');
				if($this->db->update('user', $data, array('user_id'=>$user_id))){
					$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Profile Updated')</script>");
				}
				redirect(base_url().'admin/account' , 'refresh');
			}
			else if ($task == 'update_password'){
				$old_password_encrypted				=	$this->user_model->get_current_user_detail('password');
				$old_password_submitted_encrypted	=	sha1($this->input->post('old_password'));
				$new_password						=	$this->input->post('new_password');
				$new_password_encrypted				=	sha1($this->input->post('new_password'));

				// CORRECT OLD PASSWORD NEEDED TO CHANGE PASSWORD
				if ($old_password_encrypted 		==	$old_password_submitted_encrypted){
					$this->db->update('user', array('password'=>$new_password_encrypted), array('user_id'=>$user_id));
					$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Password Updated')</script>");
				}else{
					$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','','Invalid password')</script>");
				}
				redirect(base_url().'admin/account' , 'refresh');
			}
		}
		$page_data['page_name']				=	'account';
		$page_data['page_title']			=	'Manage account';
		$this->load->view('backend/index', $page_data);
	}


	function admin_login_check()
	{
		$logged_in_user_type			=	$this->session->userdata('login_type');
		if ($logged_in_user_type == 0){
			$this->session->set_flashdata('notification', "<script>UIManager.showAlert('swal','warning','Authentication Required','Please log into your account to access page content ')</script>");

			redirect(base_url().'home/signin' , 'refresh');
		}
	}



	

}
