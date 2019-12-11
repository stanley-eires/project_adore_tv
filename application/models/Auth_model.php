<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class Auth_model extends CI_Model {
        
        
        function signin($email, $password){ 
            $credential = array('email' => $email, 'password' => sha1($password));
            $query = $this->db->get_where('user', $credential);
            if ($query->num_rows() == 1) {
                $row = $query->row();
                if($row->verified == 0){
                    $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','warning','Unverified Account','Your email account has not yet been verified. Please verify by clicking on the link sent to your email address')</script>");
                    return false;
                }
                if($row->status == 0){
                    $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','warning','Blocked Account','Your account is on lockdown. Please contact the administators to clear off this message from your account. Thanks')</script>");
                    return false;
                }
                $this->session->set_userdata('user_login_status', 1);
                $this->session->set_userdata('user_id', $row->user_id);
                $this->session->set_userdata('login_type', $row->type); // 1=admin, 0=customer
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','','Welcome to AdoreTV. The Home Of Entertainment')</script>");
                return true;
            }
            else {
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','','Incorrect Email / Password combination')</script>");
                return false;
            }
        }   
        
        function signup_user(){
            $data['user_id'] = mt_rand(1000000000,2000000000);
            $data['name'] 		= ucwords($this->input->post('name'));
            $data['email'] 		= strtolower($this->input->post('email'));
            $data['password'] 	= sha1($this->input->post('password'));
            $data["token"] = sha1(time());

            $is_existing = $this->db->get_where('user',['email'=>$data['email']])->num_rows();
            if($is_existing){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','warning','Email Exisiting','The email you entered [{$data['email']}] already exists. Use the password reset if you have forget your password')</script>");
                return false;
            }else{
                if($this->db->insert('user' , $data)){
                    $this->email_model->send_verification_mail($data['email'],$data['name'],base_url('home/verify_account/'.$data['user_id'].'/'.$data['token']));
                    $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','success','Your registration was successful','A link has been sent to your email. Click on the link to complete your account verification')</script>");
                    return true;
                }else{ 
                    $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Error','Sorry! We could not create your account at the moment. Try Again in few minutes')</script>");
                    return false;
                }
            }
        }
        
        function check_verification_token($id,$token){
            $check_token = $this->db->get_where('user',['user_id'=>$id,'token'=>$token]);
            if($check_token->num_rows() == 1){
                $this->db->update('user',['token'=>'','verified'=>1],['token'=>$token,'user_id'=>$id]);
                // create a free subscription for premium package for 30 days
                $trial_period	=	$this->crud_model->get_settings('trial_period');
                if($trial_period === 'on') {
                    $this->Subscription_model->create_free_subscription($id);
                }
                 $this->session->set_flashdata("notification","<script>UIManager.showAlert('toastr','success','Email Verification Complete','Thank you for verifying your email.)</script>");
                $this->session->set_userdata('user_login_status', 1);
                $this->session->set_userdata('user_id', $id);
                $this->session->set_userdata('login_type', $check_token->row()->type); // 1=admin, 0=customer
                return true;
            }else{ 
                $this->session->set_flashdata("notification","<script>UIManager.showAlert('swal','warning','Verification Not Successful','Either the link has already been used or you have an invalid token')</script>");
                return false;
            }
	    }

        function reset_password($email) {
            $query = $this->db->get_where('user', ['email' => $email]);
            if ($query->num_rows() > 0) {
                $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
                $new_hashed_password = sha1($new_password);
                $this->db->update('user', ['password' => $new_hashed_password], ['email'=>$email]);                    
                if($this->email_model->send_password_recovery_mail($email,$new_password)){
                    $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','success','Successful','Check mailbox for new password')</script>");
                }else{
                    $this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','error','','Password Recovery Failed')</script>");
                }
            }                         
        }

        function signout(){
            $this->session->set_userdata('user_login_status', '');
            $this->session->set_userdata('user_id', '');
            $this->session->set_userdata('login_type', '');
            $this->session->set_userdata('active_user', '');
            $this->session->set_userdata('user_entering_timestamp', '');
            $this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','Logged out','Hope you enjoyed your session')</script>");
        }
                            
                                
                            
    }
                        
/* End of file Auth.php */
    
                        