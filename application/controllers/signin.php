<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {
      
        //$this->load->model('login_model');

        $data=site_data();
        $data['_page_title']='Signin';
        $this->template->admin_login($data);

    }//end index
    
     public function signin_validation(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('user_email', 'User Email', 'trim|required|xss_clean|isemail');
        $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|xss_clean');

        
        $data['user_email']=$this->input->post('user_email');
        
        if($this->form_validation->run()==TRUE){
            $data['user_pass']=$this->input->post('user_pass');
            
            $this->load->model('user_model');
            
            $user=$this->user_model->signin($data);
            //print_r($user[0]);
            //var_dump($user);
            //exit();
            if(count($user)==1){                
                //pass
                //echo ' login pass ';
                if($user[0]['user_status']=='active'){
                    //echo 'active user';
                    //print_r($user);
                    $user_ses = array(
                            'user_sn' => $user[0]['user_sn'],                            
                            'user_name' => $user[0]['user_name'],                            
                            'user_email' => $user[0]['user_email'],
                            'user_role' => $user[0]['user_role'],                            
                            'user_access'=> getUserAccess($user[0]['user_role']),
                            'is_logged_in' => true
                    );
                    $this->session->set_userdata($user_ses);
                    
                    //update last login
                    $this->user_model->update_last_login();
                    
                    redirect('admin');
                }else{
                    //user is deactivated
                    $data['title'] = ucfirst($this->config->item('site_title'));
                    $data['header_title'] = 'Koronio - Open Source Project Management Tool';
                    $data['message']='This user is deactivated. Please contact Administrator';
                    //$data=$this->template->user_signin($data);
                }//end else
            }else{
                //Signin Auth fail
                //echo 'signin auth fail';
                //$data['title'] = ucfirst($this->config->item('site_title'));
                //$data['header_title'] = 'Koronio - Open Source Project Management Tool';
                //$data['message'] = 'Username OR Password does\'t match';
                //$data=$this->template->user_signin($data);
                $this->session->set_flashdata('email', $data['user_email']);
                $this->session->set_flashdata('notice', 'User or Password does not match!' );
                redirect ('signin');
            }
            
        }//end run validation
        else{
            //if validatin fail
            echo 'do what to do in validation fail<br>';
        }//end if validation fail
        
    }//end function
    
 
    
}//end class
?>