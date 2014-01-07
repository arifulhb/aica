require(['order!jquery','order!apppath','order!moment','order!nprogress','order!bootstrap','order!json2','order!jquery-ui',
    'order!appplugin','order!appaica'], function($,apppath,moment,NProgress){    
   
   
   //initialize
   if($('#_action').val()!='update'){
        $('#qt_date').text(moment().format('DD MMMM, YYYY'));        
        $('.qt_type_pvt').show();
        $('.qt_type_com').hide();
   }    
        
    if($('#_action').val()==='add'){
        $('#qt_history_wrapper').css('display','none');
    }    
    
    //Account Assessment Panel is off by default
    $('#panel_vehicle_info_com').css('display','none');
    $('#panel_quot_com').css('display','none');
    
    //ADD/UPDATE Status update
     $('.btn-save').click(function(){
        
        var _actin=$('#_action').val();
        //console.log('action: '+_actin);
        if(_actin=='add'){
            //console.log('add and update');
            NProgress.start();
            $.fn.save1_quotation();      
            $.fn.save2_quotation();   
            NProgress.done();
            
        }else{
           // console.log('update only');
            NProgress.start();
            $.fn.save2_quotation();   
            NProgress.done();
        }    
    });
        
    //Full Save
    $('#full_save').click(function(){
        var _actin=$('#_action').val();
        //console.log('action: '+_actin);
        if(_actin=='add'){
            //console.log('add and update');
            NProgress.start();
            $.fn.save1_quotation();      
            $.fn.save2_quotation();   
            NProgress.done();
            
        }else{
           // console.log('update only');
            NProgress.start();
            $.fn.save2_quotation();   
            NProgress.done();
        }
         
    });
    
    $('#cust_nric').autocomplete({
        source:function(request, response){
               $('#qt_customer_sn').val('');
                $.ajax({
                  type: "POST",
                  url: apppath+'/customer/searchCustomersByNric',
                  data: 'keyword='+$("#cust_nric").val(),
                  success: function(data ) {                                            
                        response( $.map( JSON.parse(data), function( item ) {                            
                          return {  label: item.cust_name+' ('+item.cust_nric+')',
                                    value: item.cust_name,
                                    cust_nric: item.cust_nric,
                                    cust_dob:item.cust_dob,
                                    cust_gender:item.cust_gender,
                                    cust_marital_status:item.cust_marital_status,
                                    cust_type: item.cust_type,
                                    cust_contact_hp: item.cust_contact_hp,
                                    cust_contact_office: item.cust_contact_office,
                                    cust_contact_house: item.cust_contact_house,
                                    cust_contact_fax: item.cust_contact_fax,
                                    cust_contact_email: item.cust_contact_email,
                                    cust_address_1: item.cust_address_1,
                                    cust_address_2: item.cust_address_2,
                                    cust_post_code: item.cust_post_code,
                                    cust_occupation: item.cust_occupation,
                                    cust_license_date: item.cust_license_date,
                                    cust_instructions:item.cust_instructions,
                                    key  : item.cust_sn}
                        }));
                    },
                    error: function(error){console.log('autocomplete error: '+error);}
                });
        },
        delay: 500,
        minLength:3,
        select: function (event,ui)
        {
            console.log(ui);
            $('#cust_type').text(ui.item.cust_type);                       
            var d= new Date(ui.item.cust_dob*1000);            
            $('#cust_dob').text(d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear());
            $('#cust_age').text(moment($('#cust_dob').text(), "DD-MM-YYYY").fromNow(true));                              
            $('#cust_dob').text(moment(ui.item.cust_dob*1000).format('DD MMMM, YYYY'));                  
            
            var cust_dlpd= new Date(ui.item.cust_license_date*1000);                  
            $('#cust_license_date').text(cust_dlpd.getDate()+'-'+(cust_dlpd.getMonth()+1)+'-'+cust_dlpd.getFullYear());
            $('#cust_driving_experience').text(moment($('#cust_license_date').text(), "DD-MM-YYYY").fromNow(true));
            $('#cust_license_date').text(moment(cust_dlpd).format('DD MMMM, YYYY'));            
            $('#qt_cust_license_date').val(cust_dlpd.getDate()+'-'+(cust_dlpd.getMonth()+1)+'-'+cust_dlpd.getFullYear());
                                    
            $('#cust_gender').text(ui.item.cust_gender);                      
             var _mstatus=$('#qt_cust_mstatus').select();                  
                  var options_m = $('option', _mstatus);                  
                    options_m.each(function() {if ($(this).text() === ui.item.cust_marital_status){$('#qt_cust_mstatus').val(ui.item.cust_marital_status);}});
                 
            $('#cust_contact_house').text(ui.item.cust_contact_house);
            $('#cust_contact_house').text(ui.item.cust_contact_house);
            $('#cust_contact_office').text(ui.item.cust_contact_office);
            $('#cust_contact_hp').text(ui.item.cust_contact_hp);
            $('#cust_contact_fax').text(ui.item.cust_contact_fax);
            $('#cust_contact_email').text(ui.item.cust_contact_email);
            $('#cust_address_line1').text(ui.item.cust_address_1);
            $('#cust_address_line2').text(ui.item.cust_address_2);
            $('#cust_post_code').text(ui.item.cust_post_code);
            $('#qt_cust_occupation').val(ui.item.cust_occupation);
            $('#cust_instructions').text(ui.item.cust_instructions);
            $('#qt_cust_instructions').val(ui.item.cust_instructions);            
            $('#qt_customer_sn').val(ui.item.key);
            $('#cust_nric').val(ui.item.cust_nric);
            $('#qt_customer_name').val(ui.item.value);
            $('#res_nric').text('');
            return false;
        },
        response:function(event, ui){
            console.log('Autocomplete response : '+ui.content.length);
            if(ui.content.length == 0){
                $('#res_nric').html(' 0 results found.');
                $('#qt_customer_sn').val($('#cust_nric').val());
            }else{
                $('#res_nric').html(' '+ui.content.length+' results found.');
            }
        }
    });// nric autocomplete
    
    //Customer Search
    $('#qt_customer_name').autocomplete({
        source:function(request, response){
               $('#qt_customer_sn').val('');
                $.ajax({
                  type: "POST",
                  url: apppath+'/customer/searchCustomers',
                  data: 'keyword='+$("#qt_customer_name").val(),
                  success: function(data ) {                      
                      //console.log('ajax success: '+data);
                        response( $.map( JSON.parse(data), function( item ) {                            
                          return {  label: item.cust_name,
                                    value: item.cust_name,
                                    cust_nric: item.cust_nric,
                                    cust_dob:item.cust_dob,
                                    cust_gender:item.cust_gender,
                                    cust_marital_status:item.cust_marital_status,
                                    cust_type: item.cust_type,
                                    cust_contact_hp: item.cust_contact_hp,
                                    cust_contact_office: item.cust_contact_office,
                                    cust_contact_house: item.cust_contact_house,
                                    cust_contact_fax: item.cust_contact_fax,
                                    cust_contact_email: item.cust_contact_email,
                                    cust_address_1: item.cust_address_1,
                                    cust_address_2: item.cust_address_2,
                                    cust_post_code: item.cust_post_code,
                                    cust_occupation: item.cust_occupation,
                                    cust_license_date: item.cust_license_date,
                                    cust_instructions:item.cust_instructions,
                                    key  : item.cust_sn}
                        }));
                    },
                    error: function(error){
                console.log('autocomplete error: '+error);}
                });
        },
        delay: 500,
        minLength:3,
        select: function (event,ui)
        {
            //console.log(ui);
            $('#cust_type').text(ui.item.cust_type);                       
            var d= new Date(ui.item.cust_dob*1000);    
           // console.log('dob: '+ui.item.cust_dob+' : '+d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear());
            $('#cust_dob').text(d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear());
            $('#cust_age').text(moment($('#cust_dob').text(), "DD-MM-YYYY").fromNow(true));                              
            $('#cust_dob').text(moment(ui.item.cust_dob*1000).format('DD MMMM, YYYY'));                  
            
            var cust_dlpd= new Date(ui.item.cust_license_date*1000);                  
            $('#cust_license_date').text(cust_dlpd.getDate()+'-'+(cust_dlpd.getMonth()+1)+'-'+cust_dlpd.getFullYear());
            $('#cust_driving_experience').text(moment($('#cust_license_date').text(), "DD-MM-YYYY").fromNow(true));
            $('#cust_license_date').text(moment(cust_dlpd).format('DD MMMM, YYYY'));            
            $('#qt_cust_license_date').val(cust_dlpd.getDate()+'-'+(cust_dlpd.getMonth()+1)+'-'+cust_dlpd.getFullYear());
                                    
            $('#cust_gender').text(ui.item.cust_gender);       
            //$('#qt_cust_mstatus').text(ui.item.cust_marital_status);       
             var _mstatus=$('#qt_cust_mstatus').select();                  
                  var options_m = $('option', _mstatus);                  
                    options_m.each(function() {if ($(this).text() === ui.item.cust_marital_status){$('#qt_cust_mstatus').val(ui.item.cust_marital_status);}});
                 
            $('#cust_contact_house').text(ui.item.cust_contact_house);
            $('#cust_contact_house').text(ui.item.cust_contact_house);
            $('#cust_contact_office').text(ui.item.cust_contact_office);
            $('#cust_contact_hp').text(ui.item.cust_contact_hp);
            $('#cust_contact_fax').text(ui.item.cust_contact_fax);
            $('#cust_contact_email').text(ui.item.cust_contact_email);
            $('#cust_address_line1').text(ui.item.cust_address_1);
            $('#cust_address_line2').text(ui.item.cust_address_2);
            $('#cust_post_code').text(ui.item.cust_post_code);
            $('#qt_cust_occupation').val(ui.item.cust_occupation);
            $('#cust_instructions').text(ui.item.cust_instructions);
            $('#qt_cust_instructions').val(ui.item.cust_instructions);            
            $('#qt_customer_sn').val(ui.item.key);
            $('#qt_customer_name').val(ui.item.value);
            $('#cust_nric').val(ui.item.cust_nric);
            $('#results').text('');
            return false;
        },
        response:function(event, ui){
            console.log('Autocomplete response : '+ui.content.length);
            if(ui.content.length == 0){
                $('#results').html(' 0 results found.');
                $('#qt_customer_sn').val($('#qt_customer_name').val());
            }else{
                $('#results').html(' '+ui.content.length+' results found.');
            }
        }
    });//end autocomplete
    
    //Save 1: Quotationi & customer 
    $('#btn_cp_customer').click(function(){
        
        NProgress.start();
            
        $.fn.save1_quotation();         
            
        NProgress.done();
         
    });
    
    //jQuery AJAX Save of Quotation & Customer Part
    $.fn.save1_quotation = function() {         
        
        var _action=$('#_action').val();
        if(_action==='update'){
            var _qt_ref_no=$('#qt_ref_no').val();    
        }
        var _qt_current_state=$('#current_status').val();
        var _qt_details_state=$('#qt_details_state').val();
        var _qt_details_lost=$('#qt_details_reason_lost').val();
        var _qt_details_insurance_type=$('input[name=qt_details_insurance_type]:checked').val();
            
        var _qt_details_remark=$('#qt_details_remark').val();
        var _qt_consultant_sn=$('#qt_consultant_sn').val();
        if($('#qt_agent_sn').val()==='None'){
            var _qt_agent_sn=null;    
        }else{var _qt_agent_sn=$('#qt_agent_sn').val();}        
        var _qt_customer_sn=$('#qt_customer_sn').val();
        var _qt_insured_driving=$('input[name=qt_cust_insured_driving]:checked').val();        
        var _qt_cust_mstatus=$('#qt_cust_mstatus').val();
        var _qt_cust_occupation=$('#qt_cust_occupation').val();
        var _qt_cust_license_date = $('#qt_cust_license_date').val();
        var _qt_cust_instructions=$('#qt_cust_instructions').val();
               
        
        var data='_action='+_action;            
            data+='&_qt_current_state='+_qt_current_state;
            data+='&_qt_details_state='+_qt_details_state;
            if(_qt_details_state==='Lost'){
            data+='&_qt_details_lost='+_qt_details_lost;    
            }
            data+='&_qt_details_insurance_type='+_qt_details_insurance_type;            
            data+='&_qt_details_remark='+_qt_details_remark;
            data+='&_qt_consultant_sn='+_qt_consultant_sn;
            data+='&_qt_agent_sn='+_qt_agent_sn;
            data+='&_qt_customer_sn='+_qt_customer_sn;
            data+='&_qt_insured_driving='+_qt_insured_driving;            
            data+='&_qt_cust_mstatus='+_qt_cust_mstatus;
            data+='&_qt_cust_occupation='+_qt_cust_occupation;
            data+='&_qt_cust_license_date='+_qt_cust_license_date;
            data+='&_qt_cust_instructions='+_qt_cust_instructions;
            
            if(_action==='update'){
                //console.log('update now');
                data+='&_qt_ref_no='+_qt_ref_no;    
            }
            //console.log('starting ajax');
            $.ajax({
                type:"POST",                        
                data:data,
                url: apppath+'/quotation/save_quotation',
                success:function(res){
                    //ADD SUCCESS
                    console.log('add succss. new id: '+res);
                    if(res!==false){ 
                        
                        console.log('res: '+res);
                        if(_action==='add'){
                            $('#qt_ref_no').val(res);                            
                        }
                        $('input[name="qt_details_insurance_type"]').each(function(i) {
                        jQuery(this).attr('disabled', 'disabled');
                            });
                        $('#_action').val('update'); 
                        _action='update';
                        $('#current_status').val(_qt_details_state);
                    }else{
                    //ADD FAILURE IN DATABASE
                        console.log('Failed to insert in Database :'+res);
                    }
                    
                    if(_action==='update'){
                       
                         $.fn.getQuotationHistory();
                        $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                            
                        });   
                                          
                    }//end update
                    
                },
                error:function(error){
                    //ADD FAILURE IN CONTROLLER
                    //var _error = $.parseJSON(error); 
                    console.log('error: '+error.length+' | '+error);
                }
            }); 
            
           
    };//en        
    

    $.fn.save2_quotation=function(){
        
        var _qt_insurance_type=$('input[name=qt_details_insurance_type]:checked').val();
        var _qt_ref_no=$('#qt_ref_no').val();       
        
        //Update
        var _qt_current_state=$('#current_status').val();
        var _qt_details_state=$('#qt_details_state').val();
        
        //Vehicle Info        
        var _qt_vi_number=$('#qt_vi_number').val();
        var _qt_vi_make=$('#qt_vi_make').val();
        var _qt_vi_model=$('#qt_vi_model').val();
        var _qt_vi_cc=$('#qt_vi_cc').val();
        var _qt_vi_year_of_manufacture=$('#qt_vi_year_of_manufacture').val();
        var _qt_vi_regn_date=$('#qt_vi_regn_date').val();
        var _qt_vi_road_tax_expire_date=$('#qt_vi_road_tax_expire_date').val();
        var _qt_vi_additional_accessories=$('#qt_vi_additional_accessories').val();
        
        if(_qt_insurance_type==='Private'){            
            var _qt_vipvt_scheme_type=$('#qt_vipvt_scheme_type').val();            
            var _qt_vipvt_feature_sunroof=$('input[name=qt_vipvt_feature_sunroof]:checked').length;
            var _qt_vipvt_feature_soft_top=$('input[name=qt_vipvt_feature_soft_top]:checked').length;
            var _qt_vipvt_feature_turbo_engine=$('input[name=qt_vipvt_feature_turbo_engine]:checked').length;
            var _qt_vipvt_feature_moonroof=$('input[name=qt_vipvt_feature_moonroof]:checked').length;
            var _qt_vipvt_feature_skyroof=$('input[name=qt_vipvt_feature_skyroof]:checked').length;
            var _qt_vipvt_feature_roof_panoramic=$('input[name=qt_vipvt_feature_roof_panoramic]:checked').length;
            
            var _qt_vipvt_type_sport_model=$('input[name=qt_vipvt_type_sport_model]:checked').length;
            var _qt_vipvt_type_mpv=$('input[name=qt_vipvt_type_mpv]:checked').length;
            var _qt_vipvt_type_suv=$('input[name=qt_vipvt_type_suv]:checked').length;
            var _qt_vipvt_type_sedan=$('input[name=qt_vipvt_type_sedan]:checked').length;            
            var _qt_vipvt_type_coupe=$('input[name=qt_vipvt_type_coupe]:checked').length;
            var _qt_vipvt_type_cabriolet=$('input[name=qt_vipvt_type_cabriolet]:checked').length;
            var _qt_vipvt_type_parallel_import=$('input[name=qt_vipvt_type_parallel_import]:checked').length;
            
        }else{            
            var _qt_vicom_type=$('#qt_vicom_type').val();            
            var _qt_vicom_unladen_weight=$('#qt_vicom_unladen_weight').val();
            var _qt_vicom_laden_weight=$('#qt_vicom_laden_weight').val();                       
            
        }//end else
        //
        //Current insurance        
        var _qt_id_company=$('#qt_id_company').val();
        var _qt_id_policy=$('#qt_id_policy_no').val();
        var _qt_id_type_of_coverage=$('#qt_id_type_of_coverage').val();
        var _qt_id_current_premium=$('#qt_id_current_premium').val();
        var _qt_id_current_excess=$('#qt_id_current_excess').val();
        var _qt_id_finance_company=$('#qt_id_finance_company').val();
        var _qt_id_current_ncd=$('#qt_id_current_ncd').val();
        var _qt_id_ncd_on_renewal=$('#qt_id_ncd_on_renewal option:selected').text();
        var _qt_id_ncd_on_change=$('input[name=qt_id_ncd_on_change]:checked').val();
        var _qt_id_ssd=$('input[name=qt_id_ssd]:checked').val();
        var _qt_ssd_date_check=$('#qt_ssd_date_check').val();
        //Current Insurance Period
        var _qt_ci_start_date=$('#qt_ci_start_date').val();
        var _qt_ci_poi_end_date=$('#qt_ci_poi_end_date').val();
        var _qt_ci_road_tax_date=$('#qt_ci_road_tax_date').val();
        var _qt_ci_ncd_protection=$('#qt_ci_ncd_protection option:selected').val();
        var _qt_ci_claim_in_3_years=$('input[name=qt_ci_claim_in_3_years]:checked').val();
        //Quotation
        var _qt_quot_insurer=$('#qt_quot_insurer option:selected').text();
        var _qt_quot_workshop=$('#qt_quot_workshop option:selected').text();
        var _qt_quot_premium=$('#qt_quot_premium').val();
        var _qt_quot_excess=$('#qt_quot_excess').val();
        var _qt_quot_remark=$('#qt_quot_remark').val();
        //Selected Insurance
        var _qt_sid_company=$('#qt_sid_company').val();
        var _qt_sid_policy=$('#qt_sid_policy_no').val();
        var _qt_sid_coverage_type=$('#qt_sid_coverage_type').val();
        var _qt_sid_premium=$('#qt_sid_premium').val();
        var _qt_sid_excess=$('#qt_sid_excess').val();
        var _qt_sid_finance_company=$('#qt_sid_finance_company').val();
        var _qt_sid_ncd=$('#qt_sid_ncd').val();
        var _qt_sid_ncd_on_renewal=$('#qt_sid_ncd_on_renewal').val();
        var _qt_sid_ssd=$('input[name=qt_sid_ssd]:checked').val();
        var _qt_sid_sdd_date_check=$('#qt_sid_sdd_date_check').val();
        var _qt_sid_start_date=$('#qt_sid_start_date').val();
        var _qt_sid_end_date=$('#qt_sid_end_date').val();
        var _qt_sid_road_tax_due=$('#qt_sid_road_tax_due').val();
        var _qt_sid_ncd_protection=$('#qt_sid_ncd_protection :selected').text();
        var _qt_aa_commission=$('#qt_aa_commission :selected').val();
        var data='qt_ref_no='+_qt_ref_no;
            data+='&_qt_current_state='+_qt_current_state;            
            data+='&_qt_details_state='+_qt_details_state;  
            data+='&_qt_aa_commission='+_qt_aa_commission;
            data+='&_qt_insurance_type='+_qt_insurance_type;
            data+='&_qt_vi_number='+_qt_vi_number;
            data+='&_qt_vi_make'+_qt_vi_make;
            data+='&_qt_vi_model='+_qt_vi_model;
            data+='&_qt_vi_cc='+_qt_vi_cc;
            data+='&_qt_vi_year_of_manufacture='+_qt_vi_year_of_manufacture;
            data+='&_qt_vi_regn_date='+_qt_vi_regn_date;
            data+='&_qt_vi_road_tax_expire_date='+_qt_vi_road_tax_expire_date;
            data+='&_qt_vi_additional_accessories='+_qt_vi_additional_accessories;
            if(_qt_insurance_type==='Private'){
                data+='&_qt_vipvt_scheme_type='+_qt_vipvt_scheme_type;
                data+='&_qt_vipvt_feature_sunroof='+_qt_vipvt_feature_sunroof;
                data+='&_qt_vipvt_feature_soft_top='+_qt_vipvt_feature_soft_top;
                data+='&_qt_vipvt_feature_turbo_engine='+_qt_vipvt_feature_turbo_engine;
                data+='&_qt_vipvt_feature_moonroof='+_qt_vipvt_feature_moonroof;
                data+='&_qt_vipvt_feature_skyroof='+_qt_vipvt_feature_skyroof;
                data+='&_qt_vipvt_feature_roof_panoramic='+_qt_vipvt_feature_roof_panoramic;
                data+='&_qt_vipvt_type_sport_model='+_qt_vipvt_type_sport_model;
                data+='&_qt_vipvt_type_mpv='+_qt_vipvt_type_mpv;
                data+='&_qt_vipvt_type_suv='+_qt_vipvt_type_suv;
                data+='&_qt_vipvt_type_sedan='+_qt_vipvt_type_sedan;
                data+='&_qt_vipvt_type_coupe='+_qt_vipvt_type_coupe;
                data+='&_qt_vipvt_type_cabriolet='+_qt_vipvt_type_cabriolet;
                data+='&_qt_vipvt_type_parallel_import='+_qt_vipvt_type_parallel_import;                
            }else{
                data+='&_qt_vicom_type='+_qt_vicom_type;
                data+='&_qt_vicom_unladen_weight='+_qt_vicom_unladen_weight;
                data+='&_qt_vicom_laden_weight='+_qt_vicom_laden_weight;
            }
            data+='&_qt_id_company='+_qt_id_company;
            data+='&_qt_id_policy_no='+_qt_id_policy;
            data+='&_qt_id_type_of_coverage='+_qt_id_type_of_coverage;
            data+='&_qt_id_current_premium='+_qt_id_current_premium;
            data+='&_qt_id_current_excess='+_qt_id_current_excess;
            data+='&_qt_id_finance_company='+_qt_id_finance_company;
            data+='&_qt_id_current_ncd='+_qt_id_current_ncd;
            data+='&_qt_id_ncd_on_renewal='+_qt_id_ncd_on_renewal;
            data+='&_qt_id_ncd_on_change='+_qt_id_ncd_on_change;
            data+='&_qt_id_ssd='+_qt_id_ssd;
            data+='&_qt_ssd_date_check='+_qt_ssd_date_check;
            data+='&_qt_ci_start_date='+_qt_ci_start_date;
            data+='&_qt_ci_poi_end_date='+_qt_ci_poi_end_date;
            data+='&_qt_ci_road_tax_date='+_qt_ci_road_tax_date;
            data+='&_qt_ci_ncd_protection='+_qt_ci_ncd_protection;
            data+='&_qt_ci_claim_in_3_years='+_qt_ci_claim_in_3_years;
            data+='&_qt_quot_insurer='+_qt_quot_insurer;
            data+='&_qt_quot_worksop='+_qt_quot_workshop;
            data+='&_qt_quot_premium='+_qt_quot_premium;
            data+='&_qt_quot_excess='+_qt_quot_excess;
            data+='&_qt_quot_remark='+_qt_quot_remark;
            data+='&_qt_sid_company='+_qt_sid_company;
            data+='&_qt_sid_policy_no='+_qt_sid_policy;
            data+='&_qt_sid_coverage_type='+_qt_sid_coverage_type;
            data+='&_qt_sid_premium='+_qt_sid_premium;
            data+='&_qt_sid_excess='+_qt_sid_excess;
            data+='&_qt_sid_finance_company='+_qt_sid_finance_company;
            data+='&_qt_sid_ncd='+_qt_sid_ncd;
            data+='&_qt_sid_ncd_on_renewal='+_qt_sid_ncd_on_renewal;
            data+='&_qt_sid_ssd='+_qt_sid_ssd;
            data+='&_qt_sid_sdd_date_check='+_qt_sid_sdd_date_check;
            data+='&_qt_sid_start_date='+_qt_sid_start_date;
            data+='&_qt_sid_end_date='+_qt_sid_end_date;
            data+='&_qt_sid_road_tax_due='+_qt_sid_road_tax_due;
            data+='&_qt_sid_ncd_protection='+_qt_sid_ncd_protection;
            
            //console.log('data: '+data);
            //return 0;
            $.ajax({
                type:"POST",
                data:data,
                url: apppath+'/quotation/update',
                success:function(res){
                        console.log('updated '+res);
                        console.log(res);
                         $.fn.getQuotationHistory();
                        $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                        });   
                    },
                error:function(error){
                    console.log('Controller error: '+error);
                }
            });
               
    }//end save 2
    
    
    
    //GetQuotationHistory
    $.fn.getQuotationHistory = function(){
       // console.log('Show history');
        var _qt_ref_no=$('#qt_ref_no').val();
        //var _qt_ref_no=76;
        $.ajax({
            type:"POST",
            data:'_qt_ref_no='+_qt_ref_no,
            url:apppath+'/quotation/getHistory',
            success:function(res){
             
              var record = $.parseJSON(res);              
              $('#edit_history_wrap').empty();
              //console.log(record);
              var history='';              
              for (var i = 0, len = record.length; i < len; i++) {
                                    
                    if( i==0 ){
                        $('#created_by').text(record[i].add_by_name);
                        $('#create_date').text(moment(record[i].add_date).format("DD MMM 'YY"));
                        if(record[i].update_by_name!=null){
                            if(record[i].update_to != record[i].update_from){
                            history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited state "'+record[i].update_from+'" to "'+record[i].update_to+'" on '+moment(record[i].update_date).format("DD MMM 'YY - hh:mm A")+'</p>';
                            }else{
                                history+='<p class="edit_history">Edited by '+record[i].update_by_name.split(" ")[0]+' on '+moment(record[i].update_date).format("DD MMM 'YY - hh:mm A")+'</p>';
                                
                            }
                        }
                        
                    }
                    else{                                                
                        if(record[i].update_by_name!=null){                        
                            if(record[i].update_to != record[i].update_from){
                                history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited state "'+record[i].update_from+'" to "'+record[i].update_to+'" on '+moment(record[i].update_date).format("DD MMM 'YY - hh:mm A")+'</p>';
                            }else{
                                history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited on '+moment(record[i].update_date).format("DD MMM 'YY - hh:mm A")+'</p>';
                            }
                            //console.log('date: '+record[i].update_date+' mod: '+moment(record[i].update_date).format("DD MMM 'YY - hh:mm A"));
                        }
                    }
                    
                }//end for
                $('#edit_history_wrap').append(history);              
                $('#qt_history_wrapper').show();
           
            },
            error:function(error){
                console.log('Show history error: '+error);
            }
        });
        
    };//end function
    
    //CONDITION LOST
    $('#qt_details_state').change(function(){
        var opt=$('#qt_details_state option:selected').val();        
        if(opt==='Lost'){
            $('#qt_details_status_lost_wrapper').css('display','block');
        }else{
            $('#qt_details_status_lost_wrapper').css('display','none');   
        }
    });
    
    //CONDITION 
    $('#qt_insurance_type_pvt').click(function(){
        //PRIVATE                
        $('#qt_ins_type_name').empty();
        $('#qt_ins_type_name').text('Vehicle Information (Private)');
        $('#qt_quot').empty();
        $('#qt_quot').text('Private');
        $('#qt_quot_insurer').empty();
        var options='<option selected disabled>Select an Option</option>';
            options+='<option value="AIG (All Age)">AIG (All Age)</option>';
            options+='<option value="AIG (All Age NCD P)">AIG (All Age NCD P)</option>';
            options+='<option value="AIG (Restricted Age)">AIG (Restricted Age)</option>';
            options+='<option value="AIG (Restricted NCD P)">AIG (Restricted NCD P)</option>';
            options+='<option value="AXA">AXA</option>';
            options+='<option value="AXA (NCD P)">AXA (NCD P)</option>';
            options+='<option value="China Taiping">China Taiping</option>';
            options+='<option value="Liberty">Liberty</option>';
            options+='<option value="Liberty (NCD P)">Liberty (NCD P)</option>';
            options+='<option value="MSIG">MSIG</option>';
            options+='<option value="MSIG (NCD P)">MSIG (NCD P)</option>';
            options+='<option value="NTUC">NTUC</option>';
            options+='<option value="NTUC (NCD P)">NTUC (NCD P)</option>';            
        $('#qt_quot_insurer').append(options);
        
        $('.qt_type_pvt').show();
        $('.qt_type_com').hide();
        
    });//end click
    //
    //CONDITION
    $('#qt_insurance_type_com').click(function(){
        //Commercial
        $('#qt_ins_type_name').empty();
        $('#qt_ins_type_name').text('Vehicle Information (Commercial)');
        $('#qt_quot').empty();
        $('#qt_quot').text('Commercial');
        $('#qt_quot_insurer').empty();
        var options='<option selected disabled>Select an Option</option>';
            options+='<option value="AIG">AIG</option>';
            options+='<option value="AXA">AXA</option>';
            options+='<option value="China Taiping">China Taiping</option>';
            options+='<option value="MSIG">MSIG</option>';
            options+='<option value="NTUC">NTUC</option>';
        $('#qt_quot_insurer').append(options);
        $('.qt_type_pvt').hide();
        $('.qt_type_com').show();
        
    });//end click            
    
    //Multiline Text
    //quotation remark
    $('#qt_details_remark_div').bind('change keypress focusout',function(){
        $('#qt_details_remark').val($(this).text());
    });
    //Customer instructions
    $('#cust_instructions_wrap').bind('change keypress focusout',function(){
        $('#qt_cust_instructions').val($(this).text());
    });
    //Vehicle Info
    $('#qt_vi_additional_accessories_wrap').bind('change keypress focusout',function(){
        $('#qt_vi_additional_accessories').val($(this).text());
    });
    //Quotation
    $('#qt_quot_remark_wrap').bind('change keypress focusout',function(){
        $('#qt_quot_remark').val($(this).text());
    });
    
    //
    //Dynamic
    //
    //Claim History
    if($('#_action').val()!='update'){
        var claim_history=1;
    }else{
        var claim_history=$('#total_claim_history').val();
    }
    $('.add_claim_history').on('click',function(){
        claim_history++;
        //var add='<label>Total Rows now: '+claim_history +'</label>';
        var claim='<section class="panel" id="qt_claim_history_'+claim_history+'">';
            claim+='<header class="panel-heading font-bold">';
                claim+='<ul class="nav nav-pills pull-right">';                
                claim+='<li><button class="btn btn-xs btn-link remove_dynamic remove_claim" value="'+claim_history+'" title="Remove"><i class="icon-trash"></i></button></li>';
                claim+='<li><a href="#" class="panel-toggle text-muted">';
                claim+='<i class="icon-caret-down text-active"></i>';
                claim+='<i class="icon-caret-up text"></i></a></li>';
                claim+='</ul>Claim History ('+claim_history+')</header>';
                claim+='<section class="panel-body"><div class="form-horizontal">';                
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_driver_name">Driver Name</label>';
                claim+='<div class="col-md-9">';
                claim+='<input type="text" class="form-control" id="qt_claim_'+claim_history+'_driver_name" maxlength="50" name="qt_claim_'+claim_history+'_driver_name" required="" placeholder="Driver Name">';
                claim+='</div></div><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_vehicle_no">Vehicle No.</label>';
                claim+='<div class="col-md-9">';
                claim+='<input type="text" class="form-control" id="qt_claim_'+claim_history+'_vehicle_no" name="qt_claim_'+claim_history+'_vehicle_no" required="" placeholder="Vehicle No.">';
                claim+='</div></div></div>';
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_accident_date">Accident Date</label>';
                claim+='<div class="col-md-9"><input class="input-sm datepicker-input form-control" id="qt_claim_'+claim_history+'_accident_date" size="16" type="text" name="qt_claim_'+claim_history+'_accident_date" maxlength="12" parsley-maxlength="12" parsley-trigger="focusout" data-date-format="dd-mm-yyyy" placeholder="Accident Date">';
                claim+='</div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_reporting_date">Reporting Date</label>';
                claim+='<div class="col-md-9"><input class="input-sm datepicker-input form-control" id="qt_claim_'+claim_history+'_reporting_date" size="16" type="text" name="qt_claim_'+claim_history+'_reporting_date" maxlength="12" parsley-maxlength="12" parsley-trigger="focusout" data-date-format="dd-mm-yyyy" placeholder="Reporting Date">';
                claim+='</div></div></div>';                
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_paid_od">Claims Paid (OD)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control" id="qt_claim_'+claim_history+'_claims_paid_od" name="qt_claim_'+claim_history+'_claims_paid_od" placeholder="Claims Paid (OD)"></div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-'+claim_history+'abel" for="qt_claim_'+claim_history+'_claims_paid_tppd">Claims Paid (TPPD)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control" id="qt_claim_'+claim_history+'_claims_paid_tppd" name="qt_claim_'+claim_history+'_claims_paid_tppd" placeholder="Claims Paid (TPPD)">';
                claim+='</div></div></div>'; 
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_paid_tpbi">Claims Paid (TPBI)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control" id="qt_claim_'+claim_history+'_claims_paid_tpbi" name="qt_claim_'+claim_history+'_claims_paid_tpbi" placeholder="Claims Paid (TPBI)">';
                claim+='</div></div></div>';
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_reserved_tppd">Claims Reserved (TPPD)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control" id="qt_claim_'+claim_history+'_claims_reserved_tppd" name="qt_claim_'+claim_history+'_claims_reserved_tppd" placeholder="Claims Reserved (TPPD)"></div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_reserved_tpbi">Claims Reserved (TPBI)</label>';
                claim+='<div class="col-md-9"><input type="number" class="form-control" id="qt_claim_'+claim_history+'_claims_reserved_tpbi" name="qt_claim_'+claim_history+'_claims_reserved_tpbi" placeholder="Claims Reserved (TPBI)">';
                claim+='</div></div></div>';                
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_windscreen">Windscreen</label><div class="col-md-9">';
                claim+='<input type="text" class="form-control" id="qt_claim_'+claim_history+'_windscreen" name="qt_claim_'+claim_history+'_windscreen" placeholder="Windscreen"></div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_reporting_only">Reporting Only</label>';
                claim+='<div class="col-md-9"><input type="text" class="form-control" id="qt_claim_'+claim_history+'_reporting_only" name="qt_claim_'+claim_history+'_reporting_only" placeholder="Reporting Only">';
                claim+='</div></div></div>';
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_private_sattlement">Private Settlement</label><div class="col-md-9">';
                claim+='<input type="text" class="form-control" id="qt_claim_'+claim_history+'_private_sattlement" name="qt_claim_'+claim_history+'_private_sattlement" placeholder="Private Settlement"></div></div><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_referred">Referred to Partner Workshop</label><div class="col-md-9">';
                claim+='<select id="qt_claim_'+claim_history+'_referred" class="form-control"><option value="Yes">Yes</option><option value="No">No</option></select>';
                claim+='</div></div></div>';                
                
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-10"></div>';
                claim+='<div class="col-sm-2">';
                claim+='<button type="button" class="btn btn-primary btn-save-claim pull-right" value="'+claim_history+'"><i class="icon-save"></i> Save</button>';
                claim+='</div></div></div>';
                claim+='</section>';
            claim+='</section>';
        $('#claim_history_wrap').append(claim);
    });
    $('#claim_history_wrap').on('click','.remove_claim',function(){
        var id=$(this).val();        
        $('#qt_claim_history_'+id).remove();
    });
    //Save Claim history
    $('#claim_area').on('click','.btn-save-claim',function(){
        NProgress.start();
       var hid= $(this).val();
       //Collect Data
       var _qt_ref_no=$('#qt_ref_no').val();
       var _driver_name=$('#qt_claim_'+hid+'_driver_name').val();
       var _vehicle_no=$('#qt_claim_'+hid+'_vehicle_no').val();
       var _accident_date=$('#qt_claim_'+hid+'_accident_date').val();
       var _reporting_date=$('#qt_claim_'+hid+'_reporting_date').val();
       var _claims_paid_od=$('#qt_claim_'+hid+'_claims_paid_od').val();
       var _claims_paid_tppd=$('#qt_claim_'+hid+'_claims_paid_tppd').val();
       var _claims_paid_tpbi=$('#qt_claim_'+hid+'_claims_paid_tpbi').val();
       var _claims_reserved_tppd=$('#qt_claim_'+hid+'_claims_reserved_tppd').val();
       var _claims_reserved_tpbi=$('#qt_claim_'+hid+'_claims_reserved_tpbi').val();
       var _windscreen=$('#qt_claim_'+hid+'_windscreen').val();
       var _reporting_only=$('#qt_claim_'+hid+'_reporting_only').val();
       var _private_sattlement=$('#qt_claim_'+hid+'_private_sattlement').val();
       var _referred=$('#qt_claim_'+hid+'_referred option:selected').val();
       
       //add in data variable
       var  _data='_driver_name='+_driver_name;
            _data+='&_chsn='+hid;
            _data+='&_vehicle_no='+_vehicle_no;
            _data+='&_accident_date='+_accident_date;
            _data+='&_reporting_date='+_reporting_date;
            _data+='&_claims_paid_od='+_claims_paid_od;
            _data+='&_claims_paid_tppd='+_claims_paid_tppd;
            _data+='&_claims_paid_tpbi='+_claims_paid_tpbi;
            _data+='&_claims_reserved_tppd='+_claims_reserved_tppd;
            _data+='&_claims_reserved_tpbi='+_claims_reserved_tpbi;
            _data+='&_windscreen='+_windscreen;
            _data+='&_reporting_only='+_reporting_only;
            _data+='&_private_sattlement='+_private_sattlement;
            _data+='&_referred='+_referred;            
            _data+='&_qt_ref_no='+_qt_ref_no;
            
       //Ajax save
       $.ajax({
           type:"POST",
           data:_data,
           url:apppath+'/quotation/update_claim_history',
           success:function(res){
               if(res==1){
                    $('#claim_area').find('#save_status_'+1).empty();
                    $('#claim_area').find('#save_status_'+1).text('Saved');
                    $('save_status_1').empty();
                    $('save_status_1').text('Saved');
                    $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                        });  
               }
               console.log(res);
               
           },
           error:function(error){
                console.log('ERROR: '+error);
           }
       });
       
       //update saved or unsaved variable
       //alert('_referred: '+_referred);
       NProgress.done();
    });
    
});