<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();        

        /**
         * IF USER IS NOT LOGGED IN/ REDIRECT TO LOGIN AUTOMATICALLY
         */
        if($this->session->userdata('user_access') == FALSE){
        
           //SET MESSAGE
           //$this->session->set_flashdata('pc_message', 'Current Password doesnt match');
           redirect('signin');
        }

    }//end constractor
    
}//end controller