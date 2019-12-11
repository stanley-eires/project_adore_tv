<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class Subscription_model extends CI_Model {
                            
        function create_free_subscription($user_id = ''){
            $trial_period_days			=	$this->crud_model->get_settings('trial_period_days');
            $increment_string			=	'+' . $trial_period_days . ' days';
            $data['plan_id']			=	3;
            $data['user_id']			=	$user_id;
            $data['paid_amount']		=	0;
            $data['payment_timestamp']	=	strtotime(date("Y-m-d H:i:s"));
            $data['timestamp_from']		=	strtotime(date("Y-m-d H:i:s"));
        
            $data['timestamp_to']		=	strtotime($increment_string, $data['timestamp_from']);
            $data['payment_method']		=	'FREE';
            $data['payment_details']	=	'';
            $data['status']				=	1;
            $this->db->insert('subscription' , $data);
        }

        function process_subscription($plan_id,$tranx,$response,$reference){
            $plan = $this->db->get_where('plan', array('plan_id' => $plan_id))->row_array();
            $data['user_id']            =  $this->session->userdata('user_id');
            $data['plan_id']            = $plan_id;
            $data['price_amount']       = $plan['price'];
            $data['paid_amount']        = ($tranx->data->amount)/100;
            $data['payment_timestamp']  = strtotime($tranx->data->paid_at);
            $data['timestamp_from']     = strtotime(date("Y-m-d H:i:s"));
            $data['timestamp_to']       = strtotime('+30 days', $data['timestamp_from']);
            $data['payment_method']     = $tranx->data->channel." / paystack";
            $data['payment_details']    = $response;
            $data['status']             = 1;
            $data['payment_reference']   = $reference;
            if($this->db->insert('subscription' , $data)){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('toastr','success','Transaction Successful','Your purchase was successful. You can print your invoice from your account section')</script>");
                return true;
            }else{
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Transaction Error','Dont be alarmed, Your payment was successful. Just some internal error that will clear in few seconds')</script>");
                return false;
            }
        }


        function validate_subscription(){
            $user_id			=	$this->session->userdata('user_id');
            $timestamp_current	=	strtotime(date("Y-m-d H:i:s"));
            $this->db->where('user_id', $user_id);
            $this->db->where('timestamp_to >' ,  $timestamp_current);
            $this->db->where('timestamp_from <' ,  $timestamp_current);
            $this->db->where('status' ,  1);
            $query				=	$this->db->order_by("subscription_id","desc")->get('subscription',1);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $subscription_id	=	$row->subscription_id;
                return $subscription_id;
            }
            else {
                return false;
            }
        }

        function get_active_plan_of_user($user_id = ''){
            $timestamp_current	=	strtotime(date("Y-m-d H:i:s"));
            $this->db->where('user_id', $user_id);
            $this->db->where('timestamp_to >' ,  $timestamp_current);
            $this->db->where('timestamp_from <' ,  $timestamp_current);
            $this->db->where('status' ,  1);
            $query				=	$this->db->order_by("subscription_id","desc")->get('subscription',1);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $plan_id	=	$row->plan_id;
                return $plan_id;
            }
            else if ($query->num_rows() == 0) {
                return false;
            }
        }


        function get_subscription_report($month, $year){
            $first_day_this_month 			= 	date('01-m-Y' , strtotime($month." ".$year));
            $last_day_this_month  			= 	date('t-m-Y' , strtotime($month." ".$year));
            $timestamp_first_day_this_month	=	strtotime($first_day_this_month);
            $timestamp_last_day_this_month	=	strtotime($last_day_this_month);
            
            $this->db->select('*')->from('user,subscription')->where("payment_timestamp > '$timestamp_first_day_this_month' AND payment_timestamp < '$timestamp_last_day_this_month' AND subscription.user_id = user.user_id");
            $subscriptions = $this->db->get()->result_array();

            return $subscriptions;
        }

        function get_subscription_detail($subscription_id,$field = ""){
            if($field == ""){
                return $this->db->get_where('subscription',['subscription_id'=>$subscription_id])->result();
            }else{
                return $this->db->get_where('subscription',['subscription_id'=>$subscription_id])->result()->$field;
            }
        }

        function get_subscription_of_user($user_id = ''){
            return $this->db->get_where('subscription',['user_id'=> $user_id])->result();
        }

        function get_current_plan_id(){
            // CURRENT SUBSCRIPTION ID
            $subscription_id			=	$this->validate_subscription();
            // CURRENT SUBSCCRIPTION DETAIL
            if($subscription_id){
                $subscription_detail		=	$this->get_subscription_detail($subscription_id);
                foreach ($subscription_detail as $row)
                    $current_plan_id		=	$row->plan_id;
                return $current_plan_id;
            }else{
                return false;
            }
            
        }

        function get_plan_detail($current_plan_id,$field = ""){
            if($field == ""){
               return $this->db->get_where('plan', ['plan_id'=> $current_plan_id])->row();
            }
            return $this->db->get_where('plan', ['plan_id'=> $current_plan_id])->row()->$field;
        }

        function get_active_plans(){
            return $this->db->get_where('plan',['status'=>1])->result_array();
	    }

        function activate_user_session($user_number){
            $this->session->set_userdata('active_user', $user_number);
            // SET USER SESSION HERE WITH TIMESTAMP FOR MULTI DEVICE ACCESS PROHIBITION
            $user_entering_timestamp		=	strtotime(date("Y-m-d H:i:s"));
            $this->session->set_userdata('user_entering_timestamp' , $user_entering_timestamp);
            $user_id						=	$this->session->userdata('user_id');
            $this->db->update('user' ,[$user_number.'_session'=>$user_entering_timestamp], ['user_id' => $user_id]);
        }


                            
                                
                            
    }
                        
/* End of file Subscription.php */
    
                        