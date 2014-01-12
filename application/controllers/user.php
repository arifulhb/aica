<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {      
        /**
         * User Management
         * Access Code: user
         */
        
        $data=site_data();
        
        if(in_array('user',$this->session->userdata('user_access'))){
            //Can Access  
                            
            //Load pagination library
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'user/index';
            $this->load->model('user_model');

            $config['total_rows'] = $this->user_model->getTotalNum();        
            $config['use_page_numbers']=true;
            $config['per_page'] = 10;
            $config['num_links'] = 5;        
            $config['uri_segment'] = 3;                        
            $this->pagination->initialize($config);

            $data['_total_rows']=$config['total_rows'];

             if($this->uri->segment(3)!=''){
                //if page number exisit
                $last=$this->uri->segment(3)*$config['per_page']>$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

                $data['_pagi_msg']=  (($this->uri->segment(3)-1)*($config['per_page']+1)).' - '.$last;                            
                $data['users']=$this->user_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

                $data['_pagi_msg'] = '1 - '.$last;                          
                $data['users']=$this->user_model->getList($config['per_page'],$this->uri->segment(3));
            }


            $data['_page_title']='User Management';
            $data['_page_caption']='Users List';
            $data['_page_description']='<i class="icon-user"></i> User Management';

            //$data['users']=$this->user_model->getlist(11,10);

            $this->template->user_home($data);
        
                  
        }//end if
        else{
            //No Permission in User Management
             $this->template->access_denied($data);
            
        }//end else access


    }//end index       
    
    
    public function save(){
        
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('user_email', 'User Email', 'trim|max_length[250]|xss_clean');
        $this->form_validation->set_rules('user_role', 'User Role', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('user_status', 'User Status', 'trim|max_length[10]|xss_clean');  
        
        $data['user_name']=$this->input->post('user_name');
        $data['user_email']=$this->input->post('user_email');
        $data['user_role']=$this->input->post('user_role');
        $data['user_status']=$this->input->post('user_status');
        
        
        if ($this->form_validation->run() == TRUE)
        {                        
            $this->load->model('user_model');
            $data['actioin']=$this->input->post('action');
            
            // Insert or Update
            if($data['actioin']=='update'){                
                //update
                 $data['user_sn'] = $this->input->post('user_sn',TRUE);                             
                 $res = $this->user_model->update($data);                                  
                 if($res==1){                     
                    $this->session->set_flashdata('success', 'true');
                    redirect('user/edit/'.$data['user_sn']);
                 }
            }else{
                //Insert
                $res = $this->user_model->insert($data);
                if($res==1){
                    redirect('user/index');                    
                }
            }//end else            
            
        }//end if validation ture
        else{
            //show dog edit page with validation error                       
            echo 'Save User<br>';
            echo validation_errors();
        }//end else    
        
        
    }//end function
    
    /**
     * Add A user
     * # email address will be set as default password
     */
    public function add(){
        
        $data=site_data();
        /*
         * User Management
         * Access Code: user_add
         */
        if(in_array('user_add',$this->session->userdata('user_access'))){
            $data['_page_title']='Add User';
            $data['_page_caption']='Add User';
            $data['_page_description']='<i class="icon-user"></i> User Management';

            $this->template->user_add($data);
        }else{
              //No Permission in User Management
             $this->template->access_denied($data);
        }
        
                
        
        
    }//end function
    
    
    public function edit(){
                
        $data=site_data();
        /*
         * User Management
         * Access Code: user_edit
         */
        if(in_array('user_edit',$this->session->userdata('user_access'))){
           $data['_page_title']='Edit User';
           $data['_page_caption']='Edit User';
           $data['_page_description']='<i class="icon-user"></i> User Management';

           $user_sn=$this->uri->segment(3);//get custoemr sn from url        
           $this->load->model('user_model');

           $data['rec']=$this->user_model->getRecord($user_sn);        
           $data['action']='update';
           $this->template->user_edit($data);   
        }else{
            //No Permission in User Management
             $this->template->access_denied($data);
        }        
        
    }//end function

    public function change_password(){
        
        $data=site_data();
        /*
         * User Management
         * Access Code: user_change_pass
         */
        if(in_array('user_change_pass',$this->session->userdata('user_access'))){
             $data['_page_title']='Change Password';
            $data['_page_caption']='Change Password';
            $data['_page_description']='<i class="icon-user"></i> User Management';

            $user_sn=$this->uri->segment(3);//get custoemr sn from url        
            $this->load->model('user_model');

            $data['rec']=$this->user_model->getRecord($user_sn);

            $this->template->user_change_pass($data);
        }else{
             //No Permission in User Management
             $this->template->access_denied($data);
        }
       
        
    }//end function
    
    public function change_password_validation(){
        
         $this->load->library('form_validation');
        
        $this->form_validation->set_rules('new_pass', 'Password', 'trim|required|max_length[50]|xss_clean|matches[re_pass]');
        $this->form_validation->set_rules('re_pass', 'Password Confirmation', 'required|max_length[50]|xss_clean');
        
        $data['user_sn']    = $this->session->userdata('user_sn');
        $data['curr_pass']  = $this->input->post('curr_pass');
        $data['new_pass']   = $this->input->post('new_pass');
        $data['re_pass']    = $this->input->post('re_pass');
        
        //if current password pass
        if($this->check_current_password($data)){
            //Run the change password
            
            if ($this->form_validation->run() == TRUE)
            {       
            
                //Form Validation Pass                
                $this->load->model('user_model');
                $res=$this->user_model->change_pass($data);

                if($res==1){
                    //echo 'pass changed';
                    $this->session->set_flashdata('password_changed', 'true');
                    redirect('user/profile/');
                    
                }else{
                    //password changed failed in dtabase
                    $this->session->set_flashdata('pc_message', 'Password Change Operation Fail in Database');
                    redirect('user/change_password/');                                        
                }//end if

            }else{
                //Form Validation Fail
                //Redirect to password change page
                //sent validation error with flash session variable
                
                $this->session->set_flashdata('pc_message', validation_errors());
                redirect('user/change_password/');   

            }//end else
            
        }else{
            //else show message of current password not match    
            
            $this->session->set_flashdata('pc_message', 'Current Password doesnt match');
            redirect('user/change_password/');
        }//end else                                 
        
    }//end function
    
    public function profile(){
                
        $user_sn=$this->session->userdata('user_sn');
        
        $data=site_data();
        
        $data['_page_title']=$this->session->userdata['user_name'];
        $data['_page_caption']='User Profile';
        $data['_page_description']='<i class="icon-user"></i> User Management';
        
        
        $this->load->model('user_model');
                        
        $data['rec']=$this->user_model->getRecord($user_sn);
                
        $this->template->user_profile($data);
        
        
    }//end function

    private function check_current_password($data){
        
        $this->load->model('user_model');
        $res=$this->user_model->validate_current_pass($data);                
        return $res;
    }//end function

    public function signout()
    {        
        
        $this->session->sess_destroy();
        $this->session->set_userdata(array('is_logged_in'=>'','user_name'=>''));
        redirect('admin');
        
    }//end function
  
}//end class
?>