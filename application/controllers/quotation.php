<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {      
        $data=site_data();    
        $data['_page_title']='All Ins Commission Application';
        $this->template->admin_home($data);

    }//end index
    
    public function add(){
        
        $data=site_data();    
        $data['_page_title']='New Quotation';
        $data['_page_caption']='New Quotation';
        $data['_page_description']='Entry Page for New Quotation';
        //=> Sales Consultant List
        //=> External Agent List
        //=> Customer List
        
        $this->template->quotation_new($data);
        
    }//end function
    
}//end class
?>