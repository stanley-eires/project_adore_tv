<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class Email_model extends CI_Model {
        
        public function __construct(){
            parent::__construct();
            $this->load->library('email'); 
            $this->site_email = $this->crud_model->get_settings('site_email'); 
            $this->site_name = $this->crud_model->get_settings('site_name'); 
            $this->base_url = base_url();
            $this->logo = base_url('assets/img/NEW2.png');       
        }
        
         
        
        private function _do_email($to,$email_subject,$message_body){

            /** USING SENDGRID API */

            require "sendgrid-php/sendgrid-php.php";
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($this->crud_model->get_settings('site_email'), $this->crud_model->get_settings('site_name'));
            $email->setSubject($email_subject);
            $email->addTo($to);
            $email->addContent("text/html",$message_body);
            $sendgrid = new \SendGrid('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');
            try{
                
                $response = $sendgrid->send($email);
                return true;
            }catch (Exception $e){
                return false;
            }

            /** USING CODEIGNITER INBUILT EMAIL LIBRARY */

            // $config = array();
            // $config['useragent']	= "CodeIgniter";
            // $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
            // //$config['protocol']		= "sendmail";
            // $config['smtp_host']	= "localhost";
            // $config['smtp_port']	= "25";
            // $config['mailtype']		= 'html';
            // $config['charset']		= 'utf-8';
            // $config['newline']		= "\r\n";
            // $config['wordwrap']		= TRUE;

		
            // $this->email->initialize($config);
            // $this->email->from($this->crud_model->get_settings('site_email'), $this->crud_model->get_settings('site_name'));
            // $this->email->to($to);
            // $this->email->subject($email_subject);
            // $this->email->message($message_body);
            // return $this->email->send();		
        }
        
        public function send_password_recovery_mail($email,$password) {
            $template = file_get_contents(APPPATH."models/mail_templates/password_recovery_template.php");
            $body = sprintf($template,$this->logo,$password,$this->site_email,$this->site_email);
           return $this->_do_email($email,"Password Reset",$body);
        }

        public function send_verification_mail($email,$name,$verification_link) {
            $template = file_get_contents(APPPATH."models/mail_templates/verification_template.php");
            $body = sprintf($template,$this->logo,$this->base_url,$this->site_name,$this->site_name,$name,$this->site_name,$email,$verification_link,$verification_link,$this->site_email,$this->site_email);
           return $this->_do_email($email,"Please verify your email",$body);
        }
                            
                                
                            
    }
                        
/* End of file Email_model.php */
    
                        