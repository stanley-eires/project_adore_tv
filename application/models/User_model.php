<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class User_model extends CI_Model {
                            
        function get_current_user_detail($field = ""){
            $user_id	=	$this->session->userdata('user_id');
            if($field == ""){
               return $this->db->get_where('user', ['user_id'=>$user_id])->row();
            }
            return $this->db->get_where('user', ['user_id'=>$user_id])->row()->$field;
		}
		
		public function get_users($user_id = "", $field = "")
        {
            if ($field == "" && $user_id == "") {
                return $this->db->order_by('id', 'desc')->get('user')->result();
            }
            return $this->db->get_where('user', ['user_id'=>$user_id])->row()->$field;
        }


        function change_user_email(){
            $user_id = $this->session->userdata('user_id');
			$old_password_encrypted	= $this->get_current_user_detail("password");
			$old_password_submitted_encrypted =	sha1($this->input->post('old_password'));
			$new_email = $this->input->post('new_email');

            // DUPLICATE EMAIL DENIES EMAIL CHANGE
			if ($this->db->get_where("user",['email'=> $new_email])->num_rows() > 0){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Duplicate Email','The Email you entered already exists')</script>");
                return false;
			}

			// CORRECT PASSWORD NEEDED TO CHANGE EMAIL
			if ($old_password_encrypted == $old_password_submitted_encrypted){
				$this->db->update('user', ['email'=>$new_email], ['user_id'=>$user_id]);
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Email Change Successful')</script>");
                return true;
			}
			else{
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Invalid Password','Please enter your current password')</script>");
                return false;
			}
        }

        function change_user_password(){
            $user_id = $this->session->userdata('user_id');
			$old_password_encrypted	= $this->get_current_user_detail("password");
			$old_password_submitted_encrypted =	sha1($this->input->post('old_password'));
			$new_password =	$this->input->post('new_password');
			$new_password_encrypted	= sha1($this->input->post('new_password'));

			// NEW PASSWORD MUST BE 6 CHARACTER LONG
			if (strlen($new_password) < 6){
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','warning','Password Length','Sorry, Password length must be more than 6 characters')</script>");
				return false;
			}

			// CORRECT OLD PASSWORD NEEDED TO CHANGE PASSWORD
			if ($old_password_encrypted ==	$old_password_submitted_encrypted){
				$this->db->update('user', ['password'=>$new_password_encrypted], ['user_id'=>$user_id]);
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Password Changed Successful')</script>");
				return true;
			}
			else{
				$this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Invalid Password','Please make sure the password you are entering is your current password')</script>");
				return false;
			}
        }
                                
                                
                            
    }
                        
/* End of file User_model.php */
    
                        