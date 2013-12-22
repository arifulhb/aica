<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {
             
        $data=site_data();

        if($this->session->userdata('is_logged_in')==TRUE){            
            //echo ' loggedin session ';
            $data['_page_title']='All Ins Commission Application';
            $this->template->admin_home($data);    
            
        }else{
            //user not logged in
            //redirect to login
            redirect('signin');
            
        }//end else
                

    }//end index
    
}//end class
?>