<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class Payment_model extends CI_Model {
                            
        function get_paystack_key($type='public'){
            $paystack_settings = $this->crud_model->get_settings('paystack');
            $paystack = json_decode($paystack_settings);
            if($paystack[0]->mode == 'sandbox'){
                if($type == 'public'){
                    return $paystack[0]->sandbox_public_key;
                }elseif($type == 'private'){
                    return $paystack[0]->sandbox_private_key;
                }
            }elseif($paystack[0]->mode == 'production'){
                if($type == 'public'){
                    return $paystack[0]->production_public_key;
                }elseif($type == 'private'){
                    return $paystack[0]->production_public_key;
                }
            }
        }

        function process_payment($reference,$plan_id){

            //CHECK IF THIS REF HAS ALREADY BEEN USED
            $ref_num = $this->db->get_where('subscription',['payment_reference'=>$reference])->num_rows();
            if($ref_num > 0){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Transaction Failed','Your purchase was not successful. Already existing transaction reference')</script>");
                return false;
            }
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Bearer {$this->get_paystack_key('private')}",
                    "cache-control: no-cache"
                    ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if($err){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Transaction Failed','$err')</script>");
                return false;
            }
            $tranx = json_decode($response);

            if(!$tranx->status){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Transaction Failed','$tranx->message')</script>");
                return false;
            }

            if($tranx->data->status != 'success'){
                $this->session->set_flashdata('notification',"<script>UIManager.showAlert('swal','error','Transaction Failed','Your purchase was not successful ')</script>");
                return false;
            }

            return $this->subscription_model->process_subscription($plan_id,$tranx,$response,$reference);
            
            
        }
                            
                                
                            
    }
                        
/* End of file Payment_model.php */
    
                        