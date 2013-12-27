<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function clear_cache()
    {
        include_once(APPPATH.'controllers/aica.php');
        $k=new Koronio();
        $k->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $k->output->set_header("Pragma: no-cache");

    }//end function

    
function site_data()
    {

        $data['_site_title']='AICA';
        $data['_site_description']='SITE DESCRIPTION';
        $data['_author']='Ariful Haque Bhuiyan';

        $CI = get_instance();
        /*$CI->load->model('taxonomy_model');
        $data['_tax_size']=$CI->taxonomy_model->getItemTaxonomyList('tbl_size_type');
        $data['_tax_breed']=$CI->taxonomy_model->getItemTaxonomyList('tbl_breed');
        $data['_tax_char']=$CI->taxonomy_model->getItemTaxonomyList('tbl_char');
        $data['_tax_color']=$CI->taxonomy_model->getItemTaxonomyList('tbl_color');
        */
        return $data;

    }// end site_data
    
    function getImagePath(){
        return base_url().'store/images/';
    }
    
    function getPaginationConfig(){
        $config=array();
        
        //$config['use_page_numbers'] = TRUE;

        
        $config['full_tag_open'] = '<ul class="pagination pagination-sm m-t-none m-b-none">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = ' <i title="First" class="icon-angle-double-left"></i>';
        $config['first_tag_open'] = '<li class="first">';
        $config['first_tag_close'] = '</li>';

        $config['next_link'] = ' <i title="Next" class="icon-chevron-right"></i>';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = ' <i title="Previous" class="icon-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>';

        $config['last_link'] = '<i title="Last" class="icon-angle-double-right"></i>';
        $config['last_tag_open'] = '<li class="last">';
        $config['last_tag_close'] = '</li>';
        
        $config['cur_tag_open']='<li class="current"><a href="#">';
        $config['cur_tag_close']='</a><li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';
     
        return $config;
        
    }//end function
    
    /**
     * function: 
     * @param type $type_id
     * @return string
     */
    function getUserType($type_id)
    {
        if($type_id==1){
            return 'Super User';
        }elseif($type_id==2){
            return 'Sales Consultant';
        }elseif($type_id==3){
            return 'Quotation Team';
        }elseif($type_id==4 ){
            return 'Accountant';
        }elseif($type_id==5 ){
            return 'External Agent';
        }

    }//end funcion
   
    /**
     * 
     * @param type $key
     * @return type
     */
    function  getUserAccess($key)
    {
    switch ($key)
        {
            // Super User
            case 1:
                return array('user','user_add','user_edit','user_delete','user_view',//user section
                             'quotation','quotation_all','quotation_add','quotation_edit','quotation_view','quotation_delete',//quotation
                             'qt_state_won','assign_commission', //Assigned Commission (in quotation)
                             'won_renew', 'won_export',  // Renewal & export of won deals
                             'css','css_add','css_edit','css_view','css_delete',  //css=Commission Schemes Structure (set commission)
                             'rec','rec_add','rec_edit','rec_view','rec_delete',  //Reconciliation                             
                             'cust','cust_add','cust_edit','cust_view','cust_delete'  //Customer                             
                            );
                break;

            // Sales Consultant
            case 2:
                return array(//'user','user_add','user_edit','user_delete','user_view',//user section
                             'quotation','quotation_add','quotation_edit','quotation_view','quotation_delete',//quotation
                             'assign_commission', //Assigned Commission (in quotation)
                             //'won_renew', 'won_export',  // Renewal & export of won deals
                             //'css','_add','_edit','_view','_delete',  //css=Commission Schemes Structure (set commission)
                             //'rec','rec_add','rec_edit','rec_view','rec_delete',  //Reconciliation                                                          
                             'cust','cust_add','cust_edit','cust_view','cust_delete'  //Customer                             
                            );
                break;

            // Quotation team
            case 3:
                return array(//'user','user_add','user_edit','user_delete','user_view',//user section
                             'quotation','quotation_all','quotation_add','quotation_edit','quotation_view','quotation_delete',//quotation
                             'assign_commission', //Assigned Commission (in quotation)
                             //'won_renew', 'won_export',  // Renewal & export of won deals
                             //'css','css_add','css_edit','css_view','css_delete',  //css=Commission Schemes Structure (set commission)
                             //'rec','rec_add','rec_edit','rec_view','rec_delete',  //Reconciliation                             
                             'cust','cust_add','cust_edit','cust_view','cust_delete'  //Customer                             
                            );
                break;

            // Accountant
            case 4:
                return array(//'user','user_add','user_edit','user_delete','user_view',//user section
                             'quotation','quotation_all','quotation_add','quotation_edit','quotation_view','quotation_delete',//quotation
                             'qt_state_won','assign_commission', //Assigned Commission (in quotation)
                            // 'won_renew', 
                             'won_export',  // Renewal & export of won deals
                             //'css','css_add','css_edit','css_view','css_delete',  //css=Commission Schemes Structure (set commission)
                             'rec','rec_add','rec_edit','rec_view','rec_delete',  //Reconciliation                             
                             'cust','cust_add','cust_edit','cust_view','cust_delete'  //Customer                             
                            );                
                break;
            
            // External Agent
            case 5:
                return array(//'user','user_add','user_edit','user_delete','user_view',//user section
                             'quotation','quotation_view'
                            //'quotation_all','quotation_add','quotation_edit', 'quotation_delete',//quotation
                             //'assign_commission', //Assigned Commission (in quotation)
                             //'won_renew', 'won_export',  // Renewal & export of won deals
                             //'css','css_add','css_edit','css_view','css_delete',  //css=Commission Schemes Structure (set commission)
                             //'rec','rec_add','rec_edit','rec_view','rec_delete',  //Reconciliation                             
                             //'cust','cust_add','cust_edit','cust_view','cust_delete'  //Customer                             
                            );                
                break;

            default:
                return array('none');
                break;
        }
    }//end function