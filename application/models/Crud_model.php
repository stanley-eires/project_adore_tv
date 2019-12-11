<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	/*
	* SETTINGS QUERIES
	*/
	function get_settings($type)
	{
		$description	=	$this->db->get_where('settings', array('type'=>$type))->row()->description;
		return $description;
	}


	function is_iframe($video_url)
	{
		$iframe_embed	=	true;
		if (strpos($video_url, 'youtube.com')) {
			$iframe_embed = false;
		}

		$path_info 		=	pathinfo($video_url);
		$extension		=	isset($path_info['extension'])?$path_info['extension']:"";
		if ($extension == 'mp4') {
			$iframe_embed = false;
		}
		return $iframe_embed;
	}


	

	function system_currency(){
		$data['description'] = html_escape($this->input->post('system_currency'));
        $this->db->where('type', 'system_currency');
        $this->db->update('settings', $data);

        $data['description'] = html_escape($this->input->post('currency_position'));
        $this->db->where('type', 'currency_position');
        $this->db->update('settings', $data);
	}

	// update paypal keys
	function update_paystack_keys() {
        
        $paystack_info = array();

        $paystack['active'] = $this->input->post('paystack_active');
        $paystack['mode'] = $this->input->post('paystack_mode');
		$paystack['sandbox_public_key'] = $this->input->post('sandbox_public_key');
		$paystack['sandbox_private_key'] = $this->input->post('sandbox_private_key');
		$paystack['production_private_key'] = $this->input->post('production_private_key');
		$paystack['production_public_key'] = $this->input->post('production_public_key');

        array_push($paystack_info, $paystack);

        $data['description']    =   json_encode($paystack_info);
        $this->db->where('type', 'paystack');
        $this->db->update('settings', $data);
	
    }

    // update stripe keys
    function update_interswitch_keys(){
        $interswitch_info = array();

        $interswitch['active'] = $this->input->post('interswitch_active');
        $interswitch['testmode'] = $this->input->post('testmode');
        $interswitch['public_key'] = $this->input->post('public_key');
        $interswitch['secret_key'] = $this->input->post('secret_key');
        $interswitch['public_live_key'] = $this->input->post('public_live_key');
        $interswitch['secret_live_key'] = $this->input->post('secret_live_key');


        array_push($interswitch_info, $interswitch);

        $data['description']    =   json_encode($interswitch_info);
        $this->db->where('type', 'interswitch');
        $this->db->update('settings', $data);

    }

    function get_currencies() {
      return $this->db->get('currency')->result_array();
    }


	


	function paginate($base_url, $total_rows, $per_page){
        $config = array('base_url' => $base_url,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
			//'uri_segment' => $uri_segment
		);


        $config['first_link'] = '<span aria-hidden="true">&laquo;&laquo;</span>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '<span aria-hidden="true">&raquo;&raquo;</span>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
        return $config;
	}





	function get_faq(){
		return $this->db->get('faq')->result();
	}

	function create_page(){
		$data['name'] = ucwords($this->input->post('name'));
		$data['content'] = $this->input->post('content');
		$data['status'] = $this->input->post('status');
		$data['popup'] = $this->input->post('popup');
		if($this->db->insert('pages', $data)){
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Page Published')</script>");
		}else{
			$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','','Page could not be published')</script>");
		}

	}

	function get_pages($all_page = true){
		if($all_page){
			return $this->db->get("pages")->result();
		}else{
			return $this->db->get_where("pages",['status'=>1])->result();

		}
	}

	function get_page($name){
		return $this->db->get_where('pages',['name'=>$name])->row();
	}



	




	function update_user($user_id = '')
	{
		$data['name']				=	$this->input->post('name');
		$data['email']				=	$this->input->post('email');
		return $this->db->update('user', $data, array('user_id'=>$user_id));
	}





	function check_if_exists($table,$column,$recordname){
		$nr = $this->db->get_where($table,[$column=>$recordname])->num_rows();
		if($nr == 0){return true;}else{return false;}
	}



}
