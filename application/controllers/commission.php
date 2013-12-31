<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commission extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');                    

    }//end constractor

    public function index()
    {
        /**
         * Set Comission key: css
         */
        if(in_array('css',$this->session->userdata('user_access'))){
                                            
        $data=site_data();
             
        $data['_page_title']='Commission Rate Management';
        $data['_page_caption']='Commission Rate Management';
        $data['_page_description']='Commission Plans';
        
        
        //$data['_list']=$this->commission_model->getList();
        
        //Load pagination library
        $this->load->library('pagination');

        //set pagination configuration
        $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
        $config['base_url'] = base_url().'commission/index';
        $this->load->model('commission_model');

        $config['total_rows'] = $this->commission_model->getTotalNum();        
        $config['use_page_numbers']=true;
        $config['per_page'] = 10;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 3;                        
        $this->pagination->initialize($config);


        //$data=site_data();
        $data['_total_rows']=$config['total_rows'];

        if($this->uri->segment(3)!=''){
            //if page number exisit
            $last=$this->uri->segment(3)*$config['per_page']>$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

            $data['_pagi_msg']=  (($this->uri->segment(3)-1)*($config['per_page']+1)).' - '.$last;                        
            $data['_list']=$this->commission_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1));
        }else{
            if($config['total_rows']>$config['per_page']){
                $last=$config['per_page'];      
            }else{
                $last=$config['total_rows'];      
            }

            $data['_pagi_msg'] = '1 - '.$last;              
            $data['_list']=$this->commission_model->getList($config['per_page'],$this->uri->segment(3));
        }//end else
                
        $this->template->commission_index($data);
        
        }else{            
            
            $data=site_data();
            $this->template->access_denied($data);
        }//end else

    }//end index
    
    public function add()
    {
        if(in_array('css_add',$this->session->userdata('user_access'))){
        $data=site_data();
             
        $data['_page_title']='New Commission Rate';
        $data['_page_caption']='Commission Rate Management';
        $data['_page_description']='New Commission Rate';
        $data['_action']='add';
        $this->template->commission_add($data);

        }else{            
            
            $data=site_data();
            $this->template->access_denied($data);
        }//end else
    }//end index
    
    public function edit()
    {
        if(in_array('css_add',$this->session->userdata('user_access'))){
        $data=site_data();
             
        $data['_com_sn']=$this->uri->segment(3);
        $data['_page_title']='Edt Commission Rate';
        $data['_page_caption']='Commission Rate Management';
        $data['_page_description']='Edit Commission Rate';
        $data['_action']='update';
        $this->load->model('commission_model');
        $data['_record']=$this->commission_model->getRecord($data['_com_sn']);
        $this->template->commission_edit($data);
                
        }else{            
            
            $data=site_data();
            $this->template->access_denied($data);
        }//end else
    }//end index
    
    public function delete()
    {
                     
        if(in_array('css_delete',$this->session->userdata('user_access'))){
            $com_id=$this->input->post('del_com_sn');

            $this->load->model('commission_model');

            $res = $this->commission_model->deleteRecord($com_id);

            if($res==1){
                redirect('commission/index');
            }else{
                $this->session->set_flashdata('delete_fail', 'true');
                redirect('commission/index');
            }                     
        }else{            
            
            $data=site_data();
            $this->template->access_denied($data);
        }//end else

    }//end index
    
    public function save(){
        
        if(in_array('css_add',$this->session->userdata('user_access'))){                    
            $this->load->library('form_validation');

            $this->form_validation->set_rules('c_name', 'Commission Name', 'trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('c_insurer', 'Insurer', 'trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('c_coy_rate', 'Coy Rate %', 'trim|required|max_length[4]|xss_clean|numeric');
            $this->form_validation->set_rules('c_com_rate', 'Com Rate %', 'trim|max_length[4]|xss_clean|numeric');

            $_action=$this->input->post('_action');
            $data['com_name']=$this->input->post('c_name');
            $data['com_insure']=$this->input->post('c_insurer');
            $data['com_coy_rate']=$this->input->post('c_coy_rate');
            $data['com_rate']=$this->input->post('c_com_rate');
            if($_action=='update'){
                $com_sn=$this->input->post('_com_sn');    
            }
            if ($this->form_validation->run() == TRUE)
            {                 
                $this->load->model('commission_model');
                if($_action=='add'){
                    //INSERT
                    $res= $this->commission_model->insert($data);    
                    if($res['res']==1){
                        //echo 'success';                   
                        $this->session->set_flashdata('success', 'true');
                        redirect('commission/edit/'.$res['new_id']);                    
                    }else{
                        echo 'Failed';
                    }
                }//add
                else{
                    //UPDATE
                    $res= $this->commission_model->update($data,$com_sn);    
                    if($res==1){
                        $this->session->set_flashdata('success', 'true');
                        redirect('commission/edit/'.$com_sn);
                        //echo 'success';
                    }else{
                        echo 'Failed';
                    }
                }//end update
            }{
                //VALIDATION FAILED
                echo validation_errors();
            }//end else
        }else{
            $data=site_data();
            $this->template->access_denied($data);
        }//end else
        
    }//end function
    
    
}//end class
?>