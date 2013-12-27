<?php

class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci =&get_instance();
    }//end construct
    
    function access_denied($data){
        
        $data['_content']=$this->_ci->load->view('inc/access',$data,true);

        $data['_page_title']='Access Denied';
        //Page Class Name
        $data['_page_class']='access_denied';
        
        //noindex nofollow
        $data['_noindex_meta']=true;

        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
        
    }//end function

    //Load the Home Page
    function home($data=null)
    {
        //Loadign the template        
        
        $data['_navbar_home']=$this->_ci->load->view('inc/navbar_home',$data,true);        
        $data['_content']=$this->_ci->load->view('',$data,true);
        
        //Page Class Name        
        $data['_page_class']='home';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);

    }//end home

    /**
     * Signin
     */
    
    /**
     * User Management
     */
    function user_home($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/index',$data,true);

        //Page Class Name
        $data['_page_class']='user_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
                          
    }//end function
    
    function user_profile($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/profile',$data,true);

        //Page Class Name
        $data['_page_class']='user_profile';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
                  
        
    }//end function
    
    
    function user_change_pass($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/change_pass',$data,true);

        //Page Class Name
        $data['_page_class']='user_change_pass';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
   
     function user_add($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/form',$data,true);

        //Page Class Name
        $data['_page_class']='user_add';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    
    function user_edit($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('user/form',$data,true);

        //Page Class Name
        $data['_page_class']='user_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    
    /**
     * Quotation
     */
    function quotation_new($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('quotation/form',$data,true);

        //Page Class Name
        $data['_page_class']='quotation_new';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
                  
        
    }//end function

    
    function quotation_view($data)
    {
        //Loadign the template       
        $data['_content']=$this->_ci->load->view('quotation/view',$data,true);

        //Page Class Name
        $data['_page_class']='quotation_view';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
                  
        
    }//end function

    /**
     * Customer
     */
    
    function customer_index($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('customer/index',$data,true);

        //Page Class Name
        $data['_page_class']='customer_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    
     function customer_add($data)
    {
           //Loadign the template       

        $data['_content']=$this->_ci->load->view('customer/form',$data,true);

        //Page Class Name
        $data['_page_class']='customer_add';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function

    function customer_edit($data)
    {
        //Loadign the template       
        
        $data['_content']=$this->_ci->load->view('customer/form',$data,true);
        
        //Page Class Name
        $data['_page_class']='customer_edit';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    
    
    function customer_profile($data)
    {
        //Loadign the template       
        
        $data['_content']=$this->_ci->load->view('customer/view',$data,true);
        
        //Page Class Name
        $data['_page_class']='customer_view';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);
            
    }//end function
    
    /*
     * ADMIN
     */

    function admin_home($data=null)
    {
        //Loadign the template
        //$data['_top_navigation']=$this->_ci->load->view('inc/main_navigation',$data,true);

        $data['_content']=$this->_ci->load->view('quotation/index',$data,true);

        //Page Class Name
        $data['_page_class']='quotation_index';
        
        //noindex nofollow
        $data['_noindex_meta']=true;
        
        //Load the page
        $this->_ci->load->view('page_template.php',$data);

    }//end home
    
    function admin_login($data=null)
    {
        //Loadign the template        

        $data['_content']=$this->_ci->load->view('login/index',$data,true);
        
        //Page Class Name
        $data['_page_class']='admin_login';

        //Load the page
        $this->_ci->load->view('login_template.php',$data);

    }//end home

}//end class