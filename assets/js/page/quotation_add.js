require(['order!jquery','order!apppath','order!moment','order!nprogress','order!bootstrap','order!json2',
    'order!appplugin','order!appaica'], function($,apppath,moment,NProgress){    
   
   
   //initialize
    $('#qt_date').text(moment().format('DD MMMM, YYYY'));
    
    if($('#_action').val()==='add'){
        $('#qt_history_wrapper').css('display','none');
    }
    //temp hide
    $('#qt_claim_history_1').hide();
    $('#qt_driver_1').hide();
    $('#qt_quot_pvt').hide();
    $('#qt_quot_com').hide();
    
    //Account Assessment Panel is off by default
    $('#panel_vehicle_info_com').css('display','none');    ;
    $('#panel_quot_com').css('display','none');
    
    //ADD/UPDATE Status update
     $('.btn-save').click(function(){
        //alert('btn click');
        //$('#_action').val('update');        
    });
    
    //Save 1: Quotationi & customer 
    $('#btn_cp_customer').click(function(){
        
        NProgress.start();
            
        $.fn.save1_quotation();         
            
        NProgress.done();
         
    });
    
    //Full Save
    $('#full_save').click(function(){
         //$.fn.save1_quotation();
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
                    //console.log(res);
                    if(res!==false){       
                        //console.log('res: '+res);
                        if(_action==='add'){$('#qt_ref_no').val(res);}
                        $('#_action').val('update'); 
                        _action='update';
                        $('#current_status').val(_qt_details_state);
                    }else{
                    //ADD FAILURE IN DATABASE
                        console.log('Failed to insert in Database :'+res);
                    }
                    
                    if(_action==='update'){
                        //console.log('showing...');
                        //if(res===1){
                         $.fn.getQuotationHistory();
                        $("#save_message").show().delay(5000).queue(function(n) {
                            $(this).hide('fast'); n();
                        });   
                        //}                        
                    }
                    
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
        var data='';
        
        if(_qt_insurance_type=='Private'){
            
        }else{
            
        }
        
        
        
        
    }//end save 2
    
    
    
    //GetQuotationHistory
    $.fn.getQuotationHistory = function(){
        //console.log('Show history');
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
                            history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited state "'+record[i].update_from+'" to "'+record[i].update_to+'" on '+moment(record[i].update_date).format("DD MMM 'YY - hh:MM A")+'</p>';
                            }else{
                                history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited on '+moment(record[i].update_date).format("DD MMM 'YY - hh:MM A")+'</p>';
                            }
                        }
                        
                    }
                    else{                                                
                        if(record[i].update_by_name!=null){                        
                            if(record[i].update_to != record[i].update_from){
                                history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited state "'+record[i].update_from+'" to "'+record[i].update_to+'" on '+moment(record[i].update_date).format("DD MMM 'YY - hh:MM A")+'</p>';
                            }else{
                                history+='<p class="edit_history">'+record[i].update_by_name.split(" ")[0]+' Edited on '+moment(record[i].update_date).format("DD MMM 'YY - hh:MM A")+'</p>';
                            }
                        }
                    }
                    
                }//end for
                $('#edit_history_wrap').append(history);              
                $('#qt_history_wrapper').show();
           
            },
            error:function(error){
                
            }
        });
        
    };//end function
    
    //CONDITION
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
        $('#panel_vehicle_info_pvt').css('display','block');
        $('#panel_quot_pvt').css('display','block');
        $('#panel_vehicle_info_com').css('display','none');
        $('#panel_quot_com').css('display','none');
    });//end click
    //
    //CONDITION
    $('#qt_insurance_type_com').click(function(){
        $('#panel_vehicle_info_pvt').css('display','none');
        $('#panel_quot_pvt').css('display','none');
        $('#panel_vehicle_info_com').css('display','block');
        $('#panel_quot_com').css('display','block');
        
    });//end click
    
    //show customer details
    $('#qt_customer_sn').bind('change ready',function(){
        var cust_sn=$('#qt_customer_sn option:selected').val();
        //alert(cust_sn);
        $.ajax({            
            type:"POST",
             data:'cust_sn='+cust_sn,   
              url: apppath+'/customer/getCustomerRecordJSON',
              success:function(res){                  
                  var cust = $.parseJSON(res);                    
                  
                  //var cust_sn     = cust[0].cust_sn;
                  //var cust_name     = cust[0].cust_name;
                  var cust_type     = cust[0].cust_type;
                  var cust_nric     = cust[0].cust_nric;
                  var cust_dob      = cust[0].cust_dob;
                  var cust_gender   = cust[0].cust_gender;
                  var cust_occupation   = cust[0].cust_occupation;
                  var cust_mstatus  = cust[0].cust_marital_status;                  
                  var cust_con_home   = cust[0].cust_contact_house;
                  var cust_con_ofc      =cust[0].cust_contact_office;
                  var cust_con_hp   =cust[0].cust_contact_hp;
                  var cust_email    =cust[0].cust_contact_email;
                  var cust_fax      =cust[0].cust_contact_fax;
                  var cust_address_line1=cust[0].cust_address_1;
                  var cust_address_line2=cust[0].cust_address_2;
                  var cust_post_code    =cust[0].cust_post_code;
                  //var cust_dlpd=cust[0].cust_license_date;
                  var cust_instructions =cust[0].cust_instructions;
                  
                  
                  var d= new Date(cust_dob*1000);
                  $('#cust_dob').text(d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear());
                  $('#cust_age').text(moment($('#cust_dob').text(), "DD-MM-YYYY").fromNow(true));                  
                  $('#cust_dob').text(moment(cust_dob*1000).format('DD MMMM, YYYY'));                  
                  var cust_dlpd= new Date(cust[0].cust_license_date*1000);                  
                  $('#cust_license_date').text(cust_dlpd.getDate()+'-'+(cust_dlpd.getMonth()+1)+'-'+cust_dlpd.getFullYear());
                  $('#cust_driving_experience').text(moment($('#cust_license_date').text(), "DD-MM-YYYY").fromNow(true));
                  $('#cust_license_date').text(moment(cust_dlpd).format('DD MMMM, YYYY'));
                  $('#qt_cust_license_date').val(cust_dlpd.getDate()+'-'+(cust_dlpd.getMonth()+1)+'-'+cust_dlpd.getFullYear());
                  
                  $('#cust_type').text(cust_type);
                  $('#cust_gender').text(cust_gender);
                  //$('#cust_mstatus').text(cust_mstatus);
                  $('#cust_contact_house').text(cust_con_home);
                  $('#cust_contact_office').text(cust_con_ofc);
                  $('#cust_contact_hp').text(cust_con_hp);
                  $('#cust_contact_fax').text(cust_fax);
                  $('#cust_contact_email').text(cust_email);
                  $('#cust_address_line1').text(cust_address_line1);
                  $('#cust_address_line2').text(cust_address_line2);
                  $('#cust_post_code').text(cust_post_code);
                  $('#qt_cust_occupation').val(cust_occupation);
                  $('#cust_instructions').text(cust_instructions);
                  $('#qt_cust_instructions').val(cust_instructions);
                  
                  
                  //NRIC
                  var nric=$('#cust_nric').select();                        
                  var options = $('option', nric);
                    options.each(function() {if ($(this).text() === cust_nric){$('#cust_nric').val(cust_sn);}});                    
                  //Marital Status
                  var _mstatus=$('#qt_cust_mstatus').select();                  
                  var options_m = $('option', _mstatus);                  
                    options_m.each(function() {if ($(this).text() === cust_mstatus){$('#qt_cust_mstatus').val(cust_mstatus);}});
                  //console.log('got customer');
              },
              errr:function(error){
                console.log('ERROR: '+error);
              }
        });
               
        NProgress.configure({ showSpinner: false });        
        $(document).ajaxStart(function(){
//            if(saving_operation===true){
//                NProgress.start();        
//            }
            //console.log('AJAX Start');
            
            //$('input, select').attr('disabled','DISABLED');
            //$('input, select').css('pointer','pointer');            
        });
        $(document).ajaxStop(function(){
            //if(saving_operation===true){
              //  NProgress.done();        
            //}
           //console.log('AJAX Stop');
            //console.log('AJAX Stop');
            //NProgress.done();
            //$('input, select').removeAttr('disabled');
            //$('input, select').css('pointer','default');
        });
                
    });
    
    //Multiline Text
    //quotation remark
    $('#qt_details_remark_div').bind('change keypress focusout',function(){
        $('#qt_details_remark').val($(this).text());
    });
    //Customer instructions
    $('#cust_instructions_wrap').bind('change keypress focusout',function(){
        $('#qt_cust_instructions').val($(this).text());
    });
});