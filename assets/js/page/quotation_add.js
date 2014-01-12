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
    
    //NRIC Auto Complete
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
        //var _qt_quot_insurer=$('#qt_quot_insurer option:selected').text();
        //var _qt_quot_workshop=$('#qt_quot_workshop option:selected').text();
        //var _qt_quot_premium=$('#qt_quot_premium').val();
        //var _qt_quot_excess=$('#qt_quot_excess').val();
        //var _qt_quot_remark=$('#qt_quot_remark').val();
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
            //data+='&_qt_quot_insurer='+_qt_quot_insurer;
            //data+='&_qt_quot_worksop='+_qt_quot_workshop;
            //data+='&_qt_quot_premium='+_qt_quot_premium;
            //data+='&_qt_quot_excess='+_qt_quot_excess;
            //data+='&_qt_quot_remark='+_qt_quot_remark;
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
    //Quotation
//    $('#qt_quot_remark_wrap').bind('change keypress focusout',function(){
//        $('#qt_driver_1_history').val($(this).text());
//    });
    
    //
    //Dynamic
    //
    //Claim History
    if($('#_action').val()!='update'){
        var claim_history=1;
        var named_driver=1;
    }else{
        var claim_history=$('#total_claim_history').val();
        var named_driver=$('#total_named_driver').val();
    }
    $('.add_claim_history').on('click',function(){
        claim_history++;
        
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
                claim+='<input type="text" class="form-control m-b" id="qt_claim_'+claim_history+'_driver_name" maxlength="50" name="qt_claim_'+claim_history+'_driver_name" required="" placeholder="Driver Name">';
                claim+='</div></div><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_vehicle_no">Vehicle No.</label>';
                claim+='<div class="col-md-9">';
                claim+='<input type="text" class="form-control m-b" id="qt_claim_'+claim_history+'_vehicle_no" name="qt_claim_'+claim_history+'_vehicle_no" required="" placeholder="Vehicle No.">';
                claim+='</div></div></div>';
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_accident_date">Accident Date</label>';
                claim+='<div class="col-md-9"><input class="input-sm datepicker-input form-control m-b" id="qt_claim_'+claim_history+'_accident_date" size="16" type="text" name="qt_claim_'+claim_history+'_accident_date" maxlength="12" parsley-maxlength="12" parsley-trigger="focusout" data-date-format="dd-mm-yyyy" placeholder="Accident Date">';
                claim+='</div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_reporting_date">Reporting Date</label>';
                claim+='<div class="col-md-9"><input class="input-sm datepicker-input form-control m-b" id="qt_claim_'+claim_history+'_reporting_date" size="16" type="text" name="qt_claim_'+claim_history+'_reporting_date" maxlength="12" parsley-maxlength="12" parsley-trigger="focusout" data-date-format="dd-mm-yyyy" placeholder="Reporting Date">';
                claim+='</div></div></div>';                
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_paid_od">Claims Paid (OD)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control m-b" id="qt_claim_'+claim_history+'_claims_paid_od" name="qt_claim_'+claim_history+'_claims_paid_od" placeholder="Claims Paid (OD)"></div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-'+claim_history+'abel" for="qt_claim_'+claim_history+'_claims_paid_tppd">Claims Paid (TPPD)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control m-b" id="qt_claim_'+claim_history+'_claims_paid_tppd" name="qt_claim_'+claim_history+'_claims_paid_tppd" placeholder="Claims Paid (TPPD)">';
                claim+='</div></div></div>'; 
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_paid_tpbi">Claims Paid (TPBI)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control m-b" id="qt_claim_'+claim_history+'_claims_paid_tpbi" name="qt_claim_'+claim_history+'_claims_paid_tpbi" placeholder="Claims Paid (TPBI)">';
                claim+='</div></div></div>';
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_reserved_tppd">Claims Reserved (TPPD)</label><div class="col-md-9">';
                claim+='<input type="number" class="form-control m-b" id="qt_claim_'+claim_history+'_claims_reserved_tppd" name="qt_claim_'+claim_history+'_claims_reserved_tppd" placeholder="Claims Reserved (TPPD)"></div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_claims_reserved_tpbi">Claims Reserved (TPBI)</label>';
                claim+='<div class="col-md-9"><input type="number" class="form-control m-b" id="qt_claim_'+claim_history+'_claims_reserved_tpbi" name="qt_claim_'+claim_history+'_claims_reserved_tpbi" placeholder="Claims Reserved (TPBI)">';
                claim+='</div></div></div>';                
                claim+='<div class="line line-dashed line-lg pull-in"></div>';
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_windscreen">Windscreen</label><div class="col-md-9">';
                claim+='<input type="text" class="form-control m-b" id="qt_claim_'+claim_history+'_windscreen" name="qt_claim_'+claim_history+'_windscreen" placeholder="Windscreen"></div></div>';
                claim+='<div class="col-sm-6"><label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_reporting_only">Reporting Only</label>';
                claim+='<div class="col-md-9"><input type="text" class="form-control m-b" id="qt_claim_'+claim_history+'_reporting_only" name="qt_claim_'+claim_history+'_reporting_only" placeholder="Reporting Only">';
                claim+='</div></div></div>';
                
                claim+='<div class="form-group"><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label" for="qt_claim_'+claim_history+'_private_sattlement">Private Settlement</label><div class="col-md-9">';
                claim+='<input type="text" class="form-control m-b" id="qt_claim_'+claim_history+'_private_sattlement" name="qt_claim_'+claim_history+'_private_sattlement" placeholder="Private Settlement"></div></div><div class="col-sm-6">';
                claim+='<label class="col-sm-3 control-label req" for="qt_claim_'+claim_history+'_referred">Referred to Partner Workshop</label><div class="col-md-9">';
                claim+='<select id="qt_claim_'+claim_history+'_referred" class="form-control m-b"><option value="Yes">Yes</option><option value="No">No</option></select>';
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
           url:apppath+'/quotation/updateClaimHistory',
           success:function(res){
               console.log(res);
               if(res==1){
                    $('#claim_area').find('#save_status_'+1).empty();
                    $('#claim_area').find('#save_status_'+1).text('Saved');
                    $('save_status_1').empty();
                    $('save_status_1').text('Saved');
                    $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                        });  
               }
               //console.log(res);               
           },
           error:function(error){
                console.log('ERROR: '+error);
           }
       });
              
       NProgress.done();
    });//end save claim history
    
    $('#ql_add').click(function(){
        //Get current total QL
        var _sn=$('#total_ql').val();
            _sn++;
        //get quotation type
        var _qt_insurance_type=$('input[name=qt_details_insurance_type]:checked').val();
        var _options='<option selected="" disabled="">Select an Insurer</option>';
        if (_qt_insurance_type=='Private'){
            _options+='<option value="AIG (All Age)">AIG (All Age)</option>';
            _options+='<option value="AIG (All Age NCD P)">AIG (All Age NCD P)</option>';
            _options+='<option value="AIG (Restricted Age)">AIG (Restricted Age)</option>';
            _options+='<option value="AIG (Restricted NCD P)">AIG (Restricted NCD P)</option>';
            _options+='<option value="AXA">AXA</option>';
            _options+='<option value="AXA (NCD P)">AXA (NCD P)</option>';
            _options+='<option value="China Taiping">China Taiping</option>';
            _options+='<option value="Liberty">Liberty</option>';
            _options+='<option value="Liberty (NCD P)">Liberty (NCD P)</option>';
            _options+='<option value="MSIG">MSIG</option>';
            _options+='<option value="MSIG (NCD P)">MSIG (NCD P)</option>';
            _options+='<option value="NTUC">NTUC</option>';
            _options+='<option value="NTUC (NCD P)">NTUC (NCD P)</option>';
        }else{
            _options+='<option value="AIG">AIG</option>';
            _options+='<option value="AXA">AXA</option>';
            _options+='<option value="China Taiping">China Taiping</option>';
            _options+='<option value="MSIG">MSIG</option>';
            _options+='<option value="NTUC">NTUC</option>';                                    
        }
        
        var _insurer='<select id="qt_quot_insurer_'+_sn+'" name="qt_quot_insurer_'+_sn+'" class="form-control">';
            _insurer+=_options;
            _insurer+='</select>';           
        
        var _workshop='<select id="qt_quot_workshop_'+_sn+'" name="qt_quot_workshop_'+_sn+'" class="form-control">';
            _workshop+='<option selected disabled>Select a Workshop</option>';
            _workshop+='<option value="Any">Any</option>>';
            _workshop+='<option value="Authorised">Authorised</option>';
            _workshop+='</select>';           
            
        var row='<tr id="ql_'+_sn+'">';
            row+='<td>'+_insurer+'</td>';
            row+='<td>'+_workshop+'</td>';
            row+='<td><input type="number" id="qt_quot_premium_'+_sn+'" name="qt_quot_premium_'+_sn+'" class="form-control m-b" required></td>';
            row+='<td><input type="number" id="qt_quot_excess_'+_sn+'" name="qt_quot_excess_'+_sn+'" class="form-control m-b" required></td>';            
            row+='<td><input type="text" id="qt_quot_remark_'+_sn+'" name="qt_quot_remark_'+_sn+'" class="form-control m-b" required></td>';            
            row+='<td class="action"><button id="ql_save_'+_sn+'" class="btn btn-link btn-warning btn-sm ql_save" title="Save" value="'+_sn+'"><i class="icon-save"></i> </button> ';
            row+='<button id="ql_remove_'+_sn+'" disabled class="btn btn-link btn-sm ql_remove" value="'+_sn+'" title="Remove"><i class="icon-trash"></i></button></td>';
            row+='</tr>';
        $('#quotation_list').append(row);
        
        //Update total QL
        $('#total_ql').val(_sn);
    });// add button end
    
    $('#quotation_list').on('click','.ql_save',function(){
        NProgress.start();
        var _ql_sn=$(this).val();
        var _qt_ref_no=$('#qt_ref_no').val();
        var _insurer=$('#qt_quot_insurer_'+_ql_sn+' option:selected').val();
        var _workstation=$('#qt_quot_workshop_'+_ql_sn+' option:selected').val();
        var _premium=$('#qt_quot_premium_'+_ql_sn).val();
        var _excess=$('#qt_quot_excess_'+_ql_sn).val();
        var _remark=$('#qt_quot_remark_'+_ql_sn).val();
        
        var _data='_qt_ref_no='+_qt_ref_no;
            _data+='&_ql_sn='+_ql_sn;
            _data+='&_insurer='+_insurer;
            _data+='&_workstation='+_workstation;
            _data+='&_premium='+_premium;
            _data+='&_excess='+_excess;
            _data+='&_remark='+_remark;
                        
            $.ajax({
                type:"POST",
                data:_data,
                url:apppath+'/quotation/updateQuotationItem',
                success:function(res){
                    if(res==1){
                        $('#ql_remove_'+_ql_sn).removeAttr('disabled');
                        $('#ql_save_'+_ql_sn).removeClass('btn-warning');
                        $('#ql_save_'+_ql_sn).addClass('btn-primary');
                        $('#ql_remove_'+_ql_sn).addClass('btn-danger');
                        $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                        });  
                    }//end if
                },
                error:function(error){            
                    console.log('ERROR: '+error);
                }
            }); //end ajax      
            NProgress.done();
    });//ql_save save
   
   //Remove Quotation list Item
   $('#quotation_list').on('click','.ql_remove',function(){
       var _ql_sn=$(this).val();
        var _qt_ref_no=$('#qt_ref_no').val();
        $('#remove_ql_sn').val(_ql_sn);
        $('#remove_qt_ref_no').val(_qt_ref_no);
        $('#remove_item_name').text($('#qt_quot_insurer_'+_ql_sn+' option:SELECTED').val());
        $('#remove_ql_item').modal('show');
                
   });//end removequotation item
   
   //Delete a Quotation list item
   $('#remove_quot_item').click(function(){
       var _ql_sn=$('#remove_ql_sn').val();
       var _qt_ref_no=$('#remove_qt_ref_no').val();
       var _data='_ql_sn='+_ql_sn+'&_qt_ref_no='+_qt_ref_no;
       $.ajax({
            type:"POST",
            data:_data,
            url:apppath+'/quotation/removeQuotationItem',
            success:function(res){
                if(res==1){
                    //Success
                    $('#ql_'+_ql_sn).remove();
                    $('#remove_ql_item').modal('hide');
                    
                }//end if
            },//end sucess
            error:function(error){
            console.log('ERROR: '+error);
            }
       });
               
   });// remove quot_item
   
   //REMOVE DYNAMIC CLAIM
   $('#claim_area').on('click','.remove_dynamic',function(){
       var chn=$(this).val();
       var _qt_ref_no=$('#qt_ref_no').val();
        $('#remove_chn_sn').val(chn);
        $('#remove_ch_ref_no').val(_qt_ref_no);
        $('#remove_ch_name').text('Claim History ('+chn+')');//remove the row
        $('#remove_claim_history').modal('show');//remove the modal
              
   });//end remove_dynamic
   
   //REMOVE CLAIM HISTORY
   $('#remove_ch_item').click(function(){
       
       var _chn_sn=$('#remove_chn_sn').val();
       var _qt_ref_no=$('#remove_ch_ref_no').val();
       var _data='_chn='+_chn_sn+'&_qt_ref_no='+_qt_ref_no;
       $.ajax({
            type:"POST",
            data:_data,
            url:apppath+'/quotation/removeClaimHistory',
            success:function(res){
                if(res==1){
                    //Success
                    $('#qt_claim_history_'+_chn_sn).remove();//remove the claim history panel
                    $('#remove_claim_history').modal('hide');//hide the modal
                    
                }//end if
            },//end sucess
            error:function(error){
                console.log('ERROR: '+error);
            }
       });
       
   });//end function
   
   //Add Named Driver
   $('.add_named_driver').click(function(){
       named_driver++;
       var  driver='<section class="panel" id="qt_driver_'+named_driver+'">';
            driver+='<header class="panel-heading font-bold">';
            driver+='<ul class="nav nav-pills pull-right">';
            driver+='<li><a href="#" class="panel-toggle text-muted">';
            driver+='<i class="icon-caret-down text-active"></i><i class="icon-caret-up text"></i></a></li>';            
            driver+='</ul>Named Driver ('+named_driver+')</header>';
            driver+='<section class="panel-body">';
            
            driver+='<div class="form-group"><div class="col-sm-6">';//begaining
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_name">Name</label>';
            driver+='<div class="col-md-6">';
            driver+='<input type="text" class="form-control m-b" id="qt_driver_'+named_driver+'_name" required name="qt_driver_'+named_driver+'_name" placeholder="Name" maxlength="50">';
            driver+='</div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            
            driver+='<div class="form-group"><div class="col-sm-6">';//begaining
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_nric">NRIC/FIN</label>';
            driver+='<div class="col-md-6">';
            driver+='<input type="text" class="form-control m-b" id="qt_driver_'+named_driver+'_nric" required name="qt_driver_'+named_driver+'_nric" placeholder="NRIC/FIN" maxlength="50">';
            driver+='</div></div><div class="col-sm-6">';
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_relationship">Relationship</label>';
            driver+='<div class="col-md-6">';
            driver+='<input type="text" class="form-control m-b" id="qt_driver_'+named_driver+'_relationship"  required name="qt_driver_'+named_driver+'_relationship" placeholder="Relationship" maxlength="50">';            
            driver+='</div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            
            driver+='<div class="form-group"><div class="col-sm-6">';//begaining
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_dob">Date of Birth</label>';
            driver+='<div class="col-md-6">';
            driver+='<input class="input-sm datepicker-input form-control m-b" id="qt_driver_'+named_driver+'_dob" size="16" type="text" name="qt_driver_'+named_driver+'_dob" maxlength="12" required ';
            driver+='parsley-maxlength="12" parsley-trigger="focusout" data-date-format="dd-mm-yyyy" placeholder="Date of Birth"> </div></div>';
            driver+='<div class="col-sm-6">';
            driver+='<label class="col-sm-3 control-label" >Age</label>';            
            driver+='<div class="col-md-6"><label class="col-sm-3 control-label"><span id="qt_driver_'+named_driver+'_age">[Equation]</span></label>';            
            driver+='</div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            
            driver+='<div class="form-group"><div class="col-sm-6">';//begaining
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_gender">Gender</label>';
            driver+='<div class="col-md-6">';
            driver+='<select name="qt_driver_'+named_driver+'_gender" id="qt_driver_'+named_driver+'_gender" class="form-control m-b">';
            driver+='<option value="Male">Male</option><option value="Female">Female</option>';
            driver+='</select></div></div>';
            driver+='<div class="col-sm-6"><label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_marital_status">Marital Status</label>';
            driver+='<div class="col-md-6"> <select name="qt_driver_'+named_driver+'_marital_status" id="qt_driver_'+named_driver+'_marital_status" class="form-control m-b">';
            driver+='<option value="Single">Single</option><option value="Married">Married</option>';            
            driver+='</select></div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            
            driver+='<div class="form-group"><div class="col-sm-6">';//begaining
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_occupation">Occupation</label>';
            driver+='<div class="col-md-6">';
            driver+='<input type="text" class="form-control m-b" id="qt_driver_'+named_driver+'_occupation" placeholder="Occupation" maxlength="50"  required>';            
            driver+='</div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            
            driver+='<div class="form-group"><div class="col-sm-6">';//begaining
            driver+='<label class="col-sm-3 control-label req" for="qt_driver_'+named_driver+'_license_date">Driving License Pass Date</label>';
            driver+='<div class="col-md-6">';
            driver+='<input class="input-sm datepicker-input form-control" id="qt_driver_'+named_driver+'_license_date" ';
            driver+=' size="16" type="text" name="qt_driver_'+named_driver+'_license_date" maxlength="12" ';
            driver+='parsley-maxlength="12" parsley-trigger="focusout"  required ';
            driver+='data-date-format="dd-mm-yyyy" placeholder="Driving License Pass Date">  </div></div>';
            driver+='<div class="col-sm-6">';
            driver+='<label class="col-sm-3 control-label" >Driving Experience</label>';
            driver+='<div class="col-md-6"><label class="control-label"><span id="qt_driver_'+named_driver+'_experience"></span></label>';//Calculated field            
            driver+='</div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            
            driver+='<div class="form-group"><div class="col-sm-12">';//begaining
            driver+='<label class="col-sm-3 control-label">Claim History (3 Years)</label>';
            driver+='<div class="col-sm-7"><input type="hidden" id="qt_driver_'+named_driver+'_history" name="qt_driver_'+named_driver+'_history">';
            driver+='<div id="qt_driver_'+named_driver+'_history_wrap" class="form-control m-b" ';
            driver+='style="overflow:scroll;height:150px;max-height:150px" contenteditable="true"></div>';            
            driver+='</div></div></div>';//closing
            
            driver+='<div class="line line-dashed line-lg pull-in"></div>';//devider
            driver+='<div class="form-group"><div class="col-sm-10"></div><div class="col-sm-2">';
            driver+='<button type="button" class="btn btn-primary btn-save-driver pull-right" value="'+named_driver+'"><i class="icon-save"></i> Save</button>';
            driver+='</div></div>';
            driver+='</section></section>';
            
            
       $('#named_driver_wrap').append(driver);
   });//end add named driver
    
    //Save Named driver
    $('#driver_area').on('click','.btn-save-driver',function(){
        NProgress.start();
        
        var _dsn=$(this).val();
        var _qt_ref_no=$('#qt_ref_no').val();
        
        //fill variable
        var _name=$('#qt_driver_'+_dsn+'_name').val();
        var _nric=$('#qt_driver_'+_dsn+'_nric').val();
        var _relationsip=$('#qt_driver_'+_dsn+'_relationship').val();
        var _dob=$('#qt_driver_'+_dsn+'_dob').val();
        var _gender=$('#qt_driver_'+_dsn+'_gender option:selected').val();
        var _mstatus=$('#qt_driver_'+_dsn+'_marital_status option:selected').val();
        var _occupation=$('#qt_driver_'+_dsn+'_occupation').val();
        var _license_date=$('#qt_driver_'+_dsn+'_license_date').val();
        var _history=$('#qt_driver_'+_dsn+'_history_wrap').text();
        
        //console.log(_history);
        //return 0;
        //set at _data
        var  _data='_qt_ref_no='+_qt_ref_no;
            _data+='&_dsn='+_dsn;
            _data+='&_name='+_name;
            _data+='&_nric='+_nric;
            _data+='&_relationsip='+_relationsip;
            _data+='&_dob='+_dob;
            _data+='&_gender='+_gender;
            _data+='&_mstatus='+_mstatus;
            _data+='&_occupation='+_occupation;
            _data+='&_license_date='+_license_date;
            _data+='&_history='+_history;            
            
        //ajax save
        $.ajax({
            type:"POST",
            data:_data,
            url:apppath+'/quotation/saveNameDriver',
            success:function(res){
                if(res==1){
                    //Success
                    $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                        });  
                    
                }//end if
            },//end sucess
            error:function(error){
                console.log('ERROR: '+error);
            }
        });
        NProgress.done();
    });//end saved driver
    
    //SHOW REMOVE DRIVER MODAL
    $('.remove_driver').click(function(){
        var dsn=$(this).val();
         var _qt_ref_no=$('#qt_ref_no').val();
        $('#remove_dsn_sn').val(dsn);
        $('#remove_dsn_ref_no').val(_qt_ref_no);
        $('#remove_n_driver').text('Name Driver ('+dsn+')');//remove the row
        $('#remove_name_driver').modal('show');//remove the modal
        
    });//end show remove driver
    
    //REMOVE DRIVER
    $('#remove_dsn_item').click(function(){
       
        var _dsn=$('#remove_dsn_sn').val();
       var _qt_ref_no=$('#remove_dsn_ref_no').val();
       var _data='_dsn='+_dsn+'&_qt_ref_no='+_qt_ref_no;
       $.ajax({
            type:"POST",
            data:_data,
            url:apppath+'/quotation/removeNameDriver',
            success:function(res){
                if(res==1){
                    //Success
                    $('#qt_driver_'+_dsn).remove();//remove the claim history panel
                    $('#remove_name_driver').modal('hide');//hide the modal
                    
                }//end if
            },//end sucess
            error:function(error){
                console.log('ERROR: '+error);
            }
       });
    });//end remove driver
    
});