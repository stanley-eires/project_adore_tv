<?php 

    defined('BASEPATH') OR exit('No direct script access allowed');
     

    class Custom_File_Uploader extends CI_Model {
                     
         function run ($source,$destination,$type,$new_name,$create_thumb = false,$thumb_dest=""){
             if ($_FILES[$source]['name'] != "") {
                 list($status, $data) = $this->do_upload($source, $destination, $new_name,$create_thumb,$thumb_dest);
                 if ($status == false) {
                     $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','$data')</script>");
                     return false;
                 }
                 list($status, $data) = $this->do_resize($data['full_path'], $type);
                 if ($status == false) {
                     $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','$data')</script>");
                     return false;
                 }
                 $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','uploaded successfully')</script>");
                 return true;
             }
             return true; 
        }

        function do_upload($source,$destination,$new_name,$create_thumb,$thumb_dest){
            $config['upload_path']          = $destination;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']        = FALSE;
            $config['file_name']        = $new_name;
            $config['overwrite']        = TRUE;
            $config['max_size']        = 2048;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($source)){
                return [false,$this->upload->display_errors()];
            }
            else{
                $upload_data = $this->upload->data();
                if($create_thumb && $thumb_dest != ""){
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $upload_data['full_path'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['thumb_marker'] = "";
                    $config['width']   = 300;
                    $config['height']  = 300;
                    $config['new_image']  = $thumb_dest;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                }
                return  [true,$upload_data];
            }
        }

        function do_resize($filepath,$type){
            $config['image_library'] = 'gd2';
            $config['source_image'] = $filepath;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = "";
            $config['quality'] = "100%";
            if($type == "thumbnail"){
                $config['width']   = 300;
                $config['height']  = 300;
            }
            if($type == "poster"){
                $config['width']   = 1024;
                $config['height']  = 768;
            }
            
            

            $this->image_lib->initialize($config);
            if($this->image_lib->resize()){
                $this->image_lib->clear();
                return array(TRUE,TRUE);
            }else{
                return array(FALSE,$this->image_lib->display_errors());
            }
        }
             
                            
                                
                            
    }
                        
/* End of file Custom_File_Uploader.php */
    
