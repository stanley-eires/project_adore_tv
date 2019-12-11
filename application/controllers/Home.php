<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();

	}

	public function index(){
		$this->login_check();
		$page_data['page_name']		=	'landing';
		$page_data['page_title']	=	'Welcome';
		$this->load->view('frontend/index', $page_data); 
	}

	public function faq(){
		$page_data['page_name']		=	'faq';
		$page_data['page_title']	=	'FAQ';
		$page_data['faq']	=	$this->crud_model->get_faq();
		$this->load->view('frontend/index', $page_data); 
	}

	public function page($page_name){
		//$this->login_check();
		$page_data['page_name']		=	'dynamic_page';
		$page_data['page_title']	=	urldecode($page_name);
		$page_data['page_details']	=	$this->crud_model->get_page(urldecode($page_name));
		$this->load->view('frontend/index', $page_data); 
	}

	function signin(){
		$this->login_check();
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$signin_result 	= $this->auth_model->signin($this->input->post('email'), $this->input->post('password'));
			if ($signin_result == true){
				if ($this->session->userdata('login_type') == 1){
					isset($_GET['redirect'])?redirect(base_url($_GET['redirect'])):redirect(base_url('admin/dashboard'));
				}
				else if ($this->session->userdata('login_type') == 0)
					isset($_GET['redirect'])?redirect(base_url($_GET['redirect'])):redirect(base_url('browse'));
			}else{
				redirect(base_url('home/signin'));
			}
		}else {
			$page_data['page_name']		=	'signin';
			$page_data['page_title']	=	'Sign In';
			$this->load->view('frontend/index', $page_data);
		}
	}
	function signup(){
		$this->login_check();
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			if($this->input->post('password') != $this->input->post('password_confirm')){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','Password Mismatch!','The password you entered is different from the confirmed password. Please check and try again ')</script>");
            }
			$signup_result = $this->auth_model->signup_user();
			redirect(base_url('home/signup'), 'refresh');
		}
		$page_data['page_name']		=	'signup';
		$page_data['page_title']	=	'Sign Up';
		$this->load->view('frontend/index', $page_data);

	}

	public function verify_account($id,$token){
		$this->login_check();
        $check_verification = $this->auth_model->check_verification_token($id,$token);
        if ($check_verification == true){
            $trial_period	=	$this->crud_model->get_settings('trial_period');
				if ($trial_period == 'on'){ 
					redirect(base_url('browse'), 'refresh');
				}
				else if ($trial_period == 'off'){
					redirect(base_url('browse') , 'refresh');
				}
        }else if($check_verification == false){
            redirect(base_url());
        }
    }



	function password_reset(){
		$this->login_check();
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->auth_model->reset_password($this->input->post('email'));
			redirect(base_url('home/password_reset' ));
		}
		$page_data['page_name']		=	'forget';
		$page_data['page_title']	=	'Password Reset';
		$this->load->view('frontend/index', $page_data);
	}

	function signout(){
		$this->auth_model->signout();
        redirect(base_url('home/signin'));
	}

	function login_check(){
		if ($this->session->userdata('user_login_status') === 1)
			redirect(base_url('browse'));
	}

}
