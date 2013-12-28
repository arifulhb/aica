<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {
      
        if(in_array('cust',$this->session->userdata('user_access'))){
            
            //Load pagination library
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'customer/index';
            $this->load->model('customer_model');    

            $config['total_rows'] = $this->customer_model->getTotalNum();        
            $config['use_page_numbers']=true;
            $config['per_page'] = 10;
            $config['num_links'] = 5;        
            $config['uri_segment'] = 3;                        
            $this->pagination->initialize($config);


            $data=site_data();
            $data['_total_rows']=$config['total_rows'];

            if($this->uri->segment(3)!=''){
                //if page number exisit
                $last=$this->uri->segment(3)*$config['per_page']>$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

                $data['_pagi_msg']=  (($this->uri->segment(3)-1)*($config['per_page']+1)).' - '.$last;            
                //echo 'pagi msg: '.$data['_pagi_msg'];
                $data['_cust_list']=$this->customer_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

              $data['_pagi_msg'] = '1 - '.$last;    
              //$data['_pagi_msg'] = '1 - '.$config['per_page']<$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

                $data['_cust_list']=$this->customer_model->getList($config['per_page'],$this->uri->segment(3));
            }
            $data['_page_title']='Customer Management';
            $data['_page_caption']='Customer Management';
            $data['_page_description']='Current Customers';

            //$data['_cust_list']=$this->customer_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
            $this->template->customer_index($data);

        }else{
            //echo 'Access Denied! No sufficient permittion to access this page. Please contact Administrator.';
            $data=site_data();
            $this->template->access_denied($data);
        }
        
    }//end index
    
    
    public function getCustomerRecordJSON(){
        $cust_sn=$this->input->post('cust_sn');
        
        //$this->model->load('customer_model');
        $this->load->model('customer_model');
        $res = $this->customer_model->getRecord($cust_sn);
        
        echo json_encode($res);
        
    }//END FUNCTION

        /**
     * Add New Customer Page
     */
    public function add(){
        /**
         * Access Code: css_add
         */
        if(in_array('css_add',$this->session->userdata('user_access'))){
            
            $data=site_data();
            $data['_page_title']='Add New Customer';
            $data['_page_caption']='New Customer';
            $data['_page_description']='Customer Management';
            $this->template->customer_add($data);
        
        }else{
            echo 'Access Denied! No sufficient permittion to access this page. Please contact Administrator.';
        }       
        
    }//end function add
    
    public function save(){       
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('cust_name', 'Customer Name', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('cust_nric', 'Customer NRIC', 'trim|max_length[250]|xss_clean');
        $this->form_validation->set_rules('cuts_type', 'Customer Type', 'trim|max_length[12]|xss_clean');
        $this->form_validation->set_rules('cust_dob', 'Date of Birth', 'trim|max_length[30]|xss_clean');
        $this->form_validation->set_rules('cust_gender', 'Gender', 'trim|max_length[6]|xss_clean');        
        $this->form_validation->set_rules('cust_marital_status', 'Marital Status', 'trim|max_length[10]|xss_clean');
        //$this->form_validation->set_rules('cust_instruction', 'Instruction', 'trim|max_length[1000]|xss_clean');
        $this->form_validation->set_rules('cust_email', 'Customer Email', 'trim|max_length[50]|valid_email|xss_clean');    
        $this->form_validation->set_rules('cust_license_date', 'Driving License Pass Date', 'trim|required|max_length[20]|xss_clean');
  
        
        //exit();
        $data['cust_name'] = $this->input->post('cust_name',TRUE);
        $data['cust_nric'] = $this->input->post('cust_nric',TRUE);
        $data['cust_type'] = $this->input->post('cust_type',TRUE);
        $data['cust_dob'] = date('Y-m-d', strtotime($this->input->post('cust_dob',TRUE)));
        $data['cust_gender'] = $this->input->post('cust_gender',TRUE);
        $data['cust_marital_status'] = $this->input->post('cust_marital_status',TRUE);
        $data['cust_license_date'] = date('Y-m-d', strtotime($this->input->post('cust_license_date',TRUE)));
        $data['cust_instructions'] = $this->input->post('cust_instruction',TRUE);
        $data['cust_occupation'] = $this->input->post('cust_occupation',TRUE);
        $data['cust_contact_email'] = $this->input->post('cust_email',TRUE);
        $data['cust_contact_office'] = $this->input->post('cust_contact_office',TRUE);
        $data['cust_contact_hp'] = $this->input->post('cust_contact_hp',TRUE);
        $data['cust_contact_house'] = $this->input->post('cust_contact_house',TRUE);
        $data['cust_contact_fax'] = $this->input->post('cust_contact_fax',TRUE);
        $data['cust_address_1'] = $this->input->post('cust_address_1',TRUE);
        $data['cust_address_2'] = $this->input->post('cust_address_2',TRUE);
        $data['cust_post_code'] = $this->input->post('cust_address_postcode',TRUE);
        $data['add_by']=1;//user 1        
        //$data['date_of_add']=date('Y-m-d H:i:s'); 
        $data['date_of_add']=date('Y-m-d h:i:s A',strtotime(date('Y-m-d H:i:s A')));
        $data['update_by']=1;//user 1
        
        //echo 'instruction: '+$data['cust_instructions'];
        
        //exit();
        
        if ($this->form_validation->run() == TRUE)
        {                        
            $this->load->model('customer_model');
            $actioin=$this->input->post('action');
            
            // Insert or Update
            if($actioin=='update'){                
                //update
                 $data['cust_sn'] = $this->input->post('customer_sn',TRUE);                             
                 $res = $this->customer_model->update($data);                                  
                 if($res==1){
                     //$data['success']=true;
                    //$data = array('success' =>true);
                    //$this->session->set_userdata($data);
                    //redirect('customer/profile/'.$data['cust_sn'],$this->session->all_userdata());
                    $this->session->set_flashdata('success', 'true');
                    redirect('customer/profile/'.$data['cust_sn']);
                 }
            }else{
                //Insert
                $res = $this->customer_model->insert($data);
            }            

            if($res==1){
                redirect('customer/index');
                //echo $this->db->insert_id();                
            }else{
                echo $res;   
            }
            
        }
        else{
            //show dog edit page with validation error                       
            echo 'error:';
            echo validation_errors();
        }//end else        
                
    }//end function
    
    
    public function edit(){
        /**
         * Access Code: css_edit
         */
        if(in_array('cust',$this->session->userdata('user_access'))){
         
            $data=site_data();
        
            $data['_page_title']='Edit Customer';
            $data['_page_caption']='Edit Customer';
            $data['_page_description']='Customer Management';

            $cust_sn=$this->uri->segment(3);//get custoemr sn from url        
            $this->load->model('customer_model');

            $data['customer']=$this->customer_model->getRecord($cust_sn);

            $data['action']='update';
            $this->template->customer_edit($data);     

        }else{
            echo 'Access Denied! No sufficient permittion to access this page. Please contact Administrator.';
        }           
        
    }//end function
    
    
    public function remove(){
        /**
         * Access Code: css_delete
         */
        if(in_array('css_delete',$this->session->userdata('user_access'))){            
            
        }else{
            echo 'Access Denied! No sufficient permittion to access this page. Please contact Administrator.';
        }
    }//end function remove
    
    public function profile(){
        
        $data=site_data();
        /**
         * Access_code
         */
        if(in_array('cust_view',$this->session->userdata('user_access'))){                               

            $cust_sn=$this->uri->segment(3);//get custoemr sn from url        
            $this->load->model('customer_model');

            //echo 'cust sn: '.$cust_sn;
            $data['customer']=$this->customer_model->getRecord($cust_sn);

            //print_r($data['customer']);

            //EXIT();
            $data['_page_title']=$data['customer'][0]['cust_name'].', Customer';
            $data['_page_caption']=$data['customer'][0]['cust_name'];        
            $data['_page_description']='Customer Profile, Customer Management';

            $data['action']='profile';
            $this->template->customer_profile($data);   
            
        }else{
            echo 'Access Denied! No sufficient permittion to access this page. Please contact Administrator.';
        }
    }//end function
    
}//end class
?>